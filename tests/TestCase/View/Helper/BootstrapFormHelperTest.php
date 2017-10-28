<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\BootstrapFormHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\BootstrapFormHelper Test Case
 */
class BootstrapFormHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\View\Helper\BootstrapFormHelper
     */
    public $BootstrapForm;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->BootstrapForm = new BootstrapFormHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BootstrapForm);

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
