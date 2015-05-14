<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource;

class RecipesController extends AppController
{
    /*
     *
     *
     *
     * */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash');
    }

    public function index() //list all the stored recipes
    {
        $recipes = $this->Recipes->find('all');
        $this->set(compact('recipes'));
    }

    public function view($id = null) //show information about a specific recipe
    {
        $this->loadOthers();
        $recipe = $this->Recipes->get($id);
        $result = $this->fetchIngredients($id);
        $this->set('ingredients', $result); //data required to display the recipe's ingredients list
        $this->set(compact('recipe'));
    }

    /*  Create a new recipe entity based on the form data
     *  Redirects to recipes listing
     *
     * */
    public function add()
    {
        $this->loadOthers();
        $recipe = $this->Recipes->newEntity();
        if ($this->request->is('post')) {
            $recipe = $this->Recipes->patchEntity($recipe, $this->request->data);
            if ($this->Recipes->save($recipe)) {
                $this->Flash->success('The recipe has been saved.');
            } else {
                $this->Flash->error('The recipe could not be saved. Please, try again.');
            }
            $this->redirect(['action' => 'index']);

        }
    }

    public function edit($id = null)
    {
        $this->loadOthers();
        $recipe = $this->Recipes->get($id);
        $fetched = $this->fetchIngredients($id);
        if ($this->request->is(['post', 'put'])) {
            if(($this->request->data)!=null) {
                $recipe = $this->Recipes->patchEntity($recipe, $this->request->data);
                if ($this->Recipes->save($recipe)) {
                    $this->Flash->success('The recipe has been saved.');
                } else {
                    $this->Flash->error('The recipe could not be saved. Please, try again.');
                }
                $this->redirect(['action' => 'index']);
            }
        }
        $this->set('ingredients', $fetched);
        $this->set('recipe', $recipe);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $recipe = $this->Recipes->get($id);
        if ($this->Recipes->delete($recipe)) {
            $this->Flash->success('The recipe has been deleted.');
        } else {
            $this->Flash->error('The recipe could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

    public function searchByIngredient()
    {
        $this->loadOthers();
        $query = $this->Ingredients->findByName($this->request->data['Name']);
        $result = $query->first();
        if (!$result) {
            $this->set('ingredient', null);
        } else {
            $query2 = $this->RecipeIngredient->find('all')->contain(['Recipes']);
            $query2->where(['ingredient_id' => $result->id]);
            $result = $query2->all();
            $this->set('instances', $result);
            $this->set('ingredient', $this->request->data['Name']);
        }

    }

    private function fetchIngredients($id = null)
    {
        $this->loadOthers();
        $query = $this->RecipeIngredient->find('all')->contain('Ingredients');
        $query->where(['recipe_id' => $id]);
        $result = $query->toArray();
        return $result;
    }
}
