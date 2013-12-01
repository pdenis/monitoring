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

    protected $class;
    protected $repository;
    protected $testLoader;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->class = 'Snide\\Monitoring\Model\\Application';
        $this->repository = new ApplicationRepository($this->class,'/tmp/filename.yml');
        $this->testLoader = new TestLoader();
        $this->object = new ApplicationManager($this->repository, $this->class, $this->testLoader);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }


    /**
     * @covers Snide\Monitoring\Manager\ApplicationManager::__construct
     * @covers Snide\Monitoring\Manager\ApplicationManager::createNew
     * @covers Snide\Monitoring\Manager\ApplicationManager::getTestLoader
     * @covers Snide\Monitoring\Manager\ApplicationManager::getRepository
     */
    public function test__construct()
    {
        $this->object = new ApplicationManager($this->repository, $this->class, $this->testLoader);
        $this->assertEquals($this->repository, $this->object->getRepository());
        $this->assertEquals($this->testLoader, $this->object->getTestLoader());
        $this->assertInstanceOf($this->class, $this->object->createNew());

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
}