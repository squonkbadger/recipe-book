<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RecipeIngredient Entity.
 */
class RecipeIngredient extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'recipe_id' => true,
        'ingredient_id' => true,
        'amount' => true,
        'recipe' => true,
        'ingredient' => true,
    ];
}
