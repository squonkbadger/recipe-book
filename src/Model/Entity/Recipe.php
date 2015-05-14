<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Recipe Entity.
 */
class Recipe extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'title' => true,
        'description' => true,
        'recipe_ingredient' => true,
    ];
}
