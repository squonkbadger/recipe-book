<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Hash;
use Cake\Datasource;
/**
 * RecipeIngredient Controller
 *
 * @property \App\Model\Table\RecipeIngredientTable $RecipeIngredient
 */
class RecipeIngredientController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash'); // Include the FlashComponent
    }
    /*  Creates a new recipe_ingredient entity which links a recipe with one of its ingredients
     *  Gets id of the recipe where the instance is added as parameter
     *  Gets from request the name of the ingredient to add and its amount
     *  Creates and saves a new recipe_ingredient entity with the provided data,
     *  then redirects to the view of the recipe
     * */
    public function add($recipe_id) {
        $this->loadModel('Ingredients');
        $data = $this->request->data;
        $ingredient = $this->getIngredient($data['ingredient']['name']);
        $recipe_ingredient = $this->RecipeIngredient->newEntity([
            'recipe_id' => $recipe_id,
            'ingredient_id' => $ingredient->id,
            'amount' => $data['recipe_ingredient']['amount']
        ]);
        $this->RecipeIngredient->save($recipe_ingredient);
        return $this->redirect(['controller'=>'Recipes','action'=>'view', $recipe_id]);
    }

    /*  Modify the amount of a specific ingredient in a specific recipe
     *  Gets id of the recipe_ingredient instance to modify as parameter
     *  Replaces the ingredient amount with the one received from the request and
     *  saves the modified entity
     *  Redirects to the view of the recipe
     * */
    public function edit($id) {
        $this->request->allowMethod(['post','put']);
        $recipe_ingredient = $this->RecipeIngredient->get($id);
        $recipe_ingredient->amount = $this->request->data['recipe_ingredient'];
        $this->RecipeIngredient->save($recipe_ingredient);
        return $this->redirect(['controller'=>'Recipes','action'=>'view', $recipe_ingredient->recipe_id]);
    }

    /* Break the link between a recipe and one of its ingredients, delete information about the relation
     * Receives recipe_ingredient entity id as parameter, fetches and deletes entity
     * Redirects to the view of the recipe
     * */
    public function delete($id = null) {
        $this->loadModel('Recipes');
        $this->request->allowMethod(['post', 'delete']);
        $recipe_ingredient = $this->RecipeIngredient->get($id);
        if ($this->RecipeIngredient->delete($recipe_ingredient)) {
            $this->Flash->success('The ingredient has been removed from the recipe successfully');
        } else {
            $this->Flash->error('Please, try again.');
        }
        return $this->redirect(['controller'=>'Recipes','action'=>'view', $recipe_ingredient->recipe_id]);
    }

    /* Utility function to fetch an ingredient entity
     * based on its name
     * Creates the ingredient if not already present
     * */
    private function getIngredient($name) {
        $this->loadModel('Ingredients');
        $query = $this->Ingredients->findByName($name);
        $results = $query->all();
        if ($results->isEmpty()) {
            $results = $this->Ingredients->newEntity(['name' => $name]);
            $this->Ingredients->save($results);
        } else {
            $results = $results->first();
        }
        return $results;
    }
}
