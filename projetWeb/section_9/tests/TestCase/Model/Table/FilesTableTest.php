<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FilesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FilesTable Test Case
 */
class FilesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FilesTable
     */
    protected $Files;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Files',
        'app.Cars',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Files') ? [] : ['className' => FilesTable::class];
        $this->Files = $this->getTableLocator()->get('Files', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Files);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\FilesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
