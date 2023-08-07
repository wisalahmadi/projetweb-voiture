<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CarsYear Entity
 *
 * @property int $id
 * @property string $annee
 * 
 * @property \App\Model\Entity\CarsBrand[] $cars_brand
 * @property \App\Model\Entity\CarsColorsDispo[] $cars_colors_dispo
 */
class CarsYear extends Entity
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
        'annee' => true,
        'cars_colors_dispo' => true,
    ];
}
