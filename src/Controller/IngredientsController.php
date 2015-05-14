<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ingredients Controller
 *
 * @property \App\Model\Table\IngredientsTable $Ingredients
 */
class IngredientsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $ingredients = $this->Ingredients->find('all');
        $this->set(compact('ingredients'));
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ingredient = $this->Ingredients->newEntity();
        if ($this->request->is('post')) {
            $ingredient = $this->Ingredients->patchEntity($ingredient, $this->request->data);
            if ($this->Ingredients->save($ingredient)) {
                $this->Flash->success('The ingredient has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The ingredient could not be saved. Please, try again.');
            }
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Ingredient id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ingredient = $this->Ingredients->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if (!empty($this->request->data['name'])) {
                $ingredient = $this->Ingredients->patchEntity($ingredient, $this->request->data);
                $this->Ingredients->save($ingredient);
                $this->Flash->success('Ingredient saved.');
                $this->redirect(['action'=>'index']);
            }
        }
        $this->set(compact('ingredient'));
        $this->set('_serialize', ['ingredient']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ingredient id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ingredient = $this->Ingredients->get($id);
        if ($this->Ingredients->delete($ingredient)) {
            $this->Flash->success('The ingredient has been deleted.');
        } else {
            $this->Flash->error('The ingredient could not be deleted. Please, try again.');
        }
        $this->redirect(['action'=>'index']);
    }
}
