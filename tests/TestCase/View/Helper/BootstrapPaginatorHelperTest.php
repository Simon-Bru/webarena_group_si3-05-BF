<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\BootstrapPaginatorHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\BootstrapPaginatorHelper Test Case
 */
class BootstrapPaginatorHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\View\Helper\BootstrapPaginatorHelper
     */
    public $BootstrapPaginator;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->BootstrapPaginator = new BootstrapPaginatorHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BootstrapPaginator);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
