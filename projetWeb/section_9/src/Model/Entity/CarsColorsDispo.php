<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CarsColorsDispo Entity
 *
 * @property int $id
 * @property int $car_year_id
 * @property string $color_name
 *
 * @property \App\Model\Entity\CarsYear $cars_year
 * @property \App\Model\Entity\CarsBrand $cars_brand
 */
class CarsColorsDispo extends Entity
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
        'car_year_id' => true,
        'color_name' => true,
        'cars_year' => true,
        'cars_brands' => true,
    ];
}
