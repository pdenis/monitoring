<?php

namespace Snide\Monitoring\Manager;

use Snide\Monitoring\Loader\TestLoader;
use Snide\Monitoring\Repository\Yaml\ApplicationRepository;

/**
 * Class ApplicationManagerTest
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class ApplicationManagerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ApplicationManager
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $class = 'Snide\\Monitoring\Model\\Application';
        $repository = new ApplicationRepository($class,'/tmp/filename.yml');
        $testLoader = new TestLoader();
        $this->object = new ApplicationManager($repository, $class, $testLoader);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }


    /**
     * @covers Snide\Monitoring\Manager\ApplicationManager::create
     */
    public function testCreate()
    {
    }

    /**
     * @covers Snide\Monitoring\Manager\ApplicationManager::delete
     */
    public function testDelete()
    {
    }

    /**
     * @covers Snide\Monitoring\Manager\ApplicationManager::find
     */
    public function testFind()
    {
    }

    /**
     * @covers Snide\Monitoring\Manager\ApplicationManager::findAll
     */
    public function testFindAll()
    {

    }

    /**
     * @covers Snide\Monitoring\Manager\ApplicationManager::update
     */
    public function testUpdate()
    {
    }

    /**
     * @covers Snide\Monitoring\Manager\ApplicationManager::createNew
     */
    public function testCreateNew()
    {
        $class = $this->class;

        return new $class;
    }

    /**
     * @covers Snide\Monitoring\Manager\ApplicationManager::getTestLoader
     * @covers Snide\Monitoring\Manager\ApplicationManager::setTestLoader
     */
    public function testGetSetTestLoader()
    {

    }
}