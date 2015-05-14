<?php
namespace App\Model\Table;

use App\Model\Entity\Recipe;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Recipes Model
 */
class RecipesTable extends Table
{
    public function initialize(array $config) {
        $this->table('recipes');
        $this->displayField('title');
        $this->displayField('description');
        $this->primaryKey('id');
        $this->hasMany('RecipeIngredient', [
            'dependent' => true,
            'foreignKey' => 'recipe_id'
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('title')
            ->notEmpty('description');

        return $validator;
    }
}
