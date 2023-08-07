<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SpecificationsFixture
 */
class SpecificationsFixture extends TestFixture
{
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
                'type' => 'Lorem ipsum dolor sit amet',
                'created' => '2022-10-01 20:57:21',
                'modified' => '2022-10-01 20:57:21',
            ],
        ];
        parent::init();
    }
}
