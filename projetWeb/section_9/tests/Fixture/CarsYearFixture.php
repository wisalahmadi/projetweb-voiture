<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CarsYearFixture
 */
class CarsYearFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'cars_year';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'annee' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
