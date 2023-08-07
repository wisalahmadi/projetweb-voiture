<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CarsBrandsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CarsBrandsTable Test Case
 */
class CarsBrandsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CarsBrandsTable
     */
    protected $CarsBrands;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.CarsBrands',
        'app.CarsYear',
        'app.CarsColorsDispo',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CarsBrands') ? [] : ['className' => CarsBrandsTable::class];
        $this->CarsBrands = $this->getTableLocator()->get('CarsBrands', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CarsBrands);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CarsBrandsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CarsBrandsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
