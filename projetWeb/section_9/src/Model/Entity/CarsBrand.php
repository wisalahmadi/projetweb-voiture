<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CarsBrand Entity
 *
 * @property int $id
 * @property int $car_year_id
 * @property int $car_color_dispo_id
 * @property string $brand_name
 *
 * @property \App\Model\Entity\CarsYear $cars_year
 * @property \App\Model\Entity\CarsColorsDispo $cars_colors_dispo
 */
class CarsBrand extends Entity
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
        'car_color_dispo_id' => true,
        'brand_name' => true,
        'cars_year' => true,
        'cars_colors_dispo' => true,
        'cars' => true,
    ];
}
