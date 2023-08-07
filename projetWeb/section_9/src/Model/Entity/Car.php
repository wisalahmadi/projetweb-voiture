<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Car Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $slug
 * @property string|null $image
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $model_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Model $model
 * @property \App\Model\Entity\Specification[] $specifications
 */
class Car extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'id' => true,
//        'user_id' => true,
        'name' => true,
//        'slug' => true,
        'image' => true,
//        'created' => true,
//        'modified' => true,
        'model_id' => true,
        'car_brand_id' => true,
//        'user' => true,
        'model' => true,
        'specifications' => true,
    ];
}
