<?php

namespace Snide\Monitoring\Manager;

use Snide\Monitoring\Executor\TestExecutor;

/**
 * Class TestManagerTest
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class TestManagerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var TestManager
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $executor = new TestExecutor();
        $this->object = new TestManager($executor);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }


    /**
     * @covers Snide\Monitoring\Manager\TestManager::addTest
     */
    public function testAddTest()
    {
    }


    /**
     * @covers Snide\Monitoring\Manager\TestManager::addTests
     */
    public function testAddTests()
    {
    }

    /**
     * @covers Snide\Monitoring\Manager\TestManager::getTests
     * @covers Snide\Monitoring\Manager\TestManager::setTests
     */
    public function testgetSetTests()
    {
    }

    /**
     * @covers Snide\Monitoring\Manager\TestManager::getFilteredCategory
     * @covers Snide\Monitoring\Manager\TestManager:;setFilteredCategory
     */
    public function testGetSetFilteredCategory()
    {
    }

    /**
     * @covers Snide\Monitoring\Manager\TestManager::getFilteredTests
     */
    public function testGetFilteredTests()
    {
    }

    /**
     * @covers Snide\Monitoring\Manager\TestManager::getCategories
     */
    public function testGetCategories()
    {
    }

    /**
     * @covers Snide\Monitoring\Manager\TestManager::getSuccessTests
     */
    public function testGetSuccessTests()
    {
    }

    /**
     * @covers Snide\Monitoring\Manager\TestManager::getCriticalFailedTests
     */
    public function testGetCriticalFailedTests()
    {
    }

    /**
     * @covers Snide\Monitoring\Manager\TestManager::getNoCriticalFailedtests
     */
    public function testGetNotCriticalFailedTests()
    {
    }

    /**
     * @covers Snide\Monitoring\Manager\TestManager::getCriticalTests
     */
    public function testGetCriticalTests()
    {
    }

    /**
     * @covers Snide\Monitoring\Manager\TestManager::getFailedTests
     */
    public function testGetFailedTests()
    {
    }

    /**
     * @covers Snide\Monitoring\Manager\TestManager::getTestsAsJson
     */
    public function testGetTestsAsJson()
    {
    }

    /**
     * @covers Snide\Monitoring\Manager\TestManager::getExecutableTests
     */
    public function testGetExecutableTests()
    {
    }

    /**
     * @covers Snide\Monitoring\Manager\TestManager::executeTests
     */
    public function testExecuteTests()
    {
    }
}