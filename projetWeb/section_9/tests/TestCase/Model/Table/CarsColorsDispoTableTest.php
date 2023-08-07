<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CarsColorsDispoTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CarsColorsDispoTable Test Case
 */
class CarsColorsDispoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CarsColorsDispoTable
     */
    protected $CarsColorsDispo;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.CarsColorsDispo',
        'app.CarsYear',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CarsColorsDispo') ? [] : ['className' => CarsColorsDispoTable::class];
        $this->CarsColorsDispo = $this->getTableLocator()->get('CarsColorsDispo', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CarsColorsDispo);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CarsColorsDispoTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CarsColorsDispoTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
