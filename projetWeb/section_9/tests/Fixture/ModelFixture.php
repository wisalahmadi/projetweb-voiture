<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ModelFixture
 */
class ModelFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'model';
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
                'name' => 'Lorem ipsum dolor sit amet',
                'price' => 1,
                'created' => '2022-10-01 22:52:33',
                'modified' => '2022-10-01 22:52:33',
            ],
        ];
        parent::init();
    }
}
