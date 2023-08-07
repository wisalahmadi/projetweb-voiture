<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CarsYearTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CarsYearTable Test Case
 */
class CarsYearTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CarsYearTable
     */
    protected $CarsYear;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
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
        $config = $this->getTableLocator()->exists('CarsYear') ? [] : ['className' => CarsYearTable::class];
        $this->CarsYear = $this->getTableLocator()->get('CarsYear', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CarsYear);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CarsYearTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
