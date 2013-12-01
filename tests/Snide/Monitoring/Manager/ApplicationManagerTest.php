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
    protected $filename;
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->filename = '/tmp/filename.yml';
        $this->class = 'Snide\\Monitoring\Model\\Application';
        $this->repository = new ApplicationRepository($this->class, $this->filename);
        $this->testLoader = new TestLoader();
        $this->object = new ApplicationManager($this->repository, $this->class, $this->testLoader);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        if(file_exists($this->filename)) {
            unlink($this->filename);
        }
    }


    /**
     * @covers Snide\Monitoring\Manager\ApplicationManager::__construct
     * @covers Snide\Monitoring\Manager\ApplicationManager::createNew
     * @covers Snide\Monitoring\Manager\ApplicationManager::getTestLoader
     * @covers Snide\Monitoring\Manager\ApplicationManager::getRepository
     */
    public function testConstruct()
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
        $application = $this->object->createNew();
        $application->setName('My app 3');
        $application->setUrl('http://localhost/3');

        $applications = $this->object->findAll();
        $application->setId(sizeof($applications) + 1);
        $applications[] = $application;
        $this->object->create($application);

        $this->assertEquals(sizeof($applications), sizeof($this->object->findAll()));
    }

    /**
     * @covers Snide\Monitoring\Manager\ApplicationManager::delete
     */
    public function testDelete()
    {
        $application = $this->object->createNew();
        $application->setName('My app');
        $application->setUrl('http://localhost');
        $this->object->create($application);
        $application->setId(1);
        $applicationTwo = $this->object->createNew();
        $applicationTwo->setName('My app 2');
        $applicationTwo->setUrl('http://localhost/2');
        $this->object->create($applicationTwo);
        $applicationTwo->setId(2);

        $applications = $this->object->findAll();

        $this->object->delete($applications[0]);
        unset($applications[0]);
        $this->assertEquals(sizeof($applications), sizeof($this->object->findAll()));
    }

    /**
     * @covers Snide\Monitoring\Manager\ApplicationManager::find
     */
    public function testFind()
    {
        $application = $this->object->createNew();
        $application->setName('My app');
        $application->setUrl('http://localhost');
        $this->object->create($application);
        $application->setId(1);
        $applicationTwo = $this->object->createNew();
        $applicationTwo->setName('My app 2');
        $applicationTwo->setUrl('http://localhost/2');
        $this->object->create($applicationTwo);
        $applicationTwo->setId(2);

        $this->assertNull($this->object->find(-1));
        $applications = $this->object->findAll();

        $this->assertNotNull($this->object->find($applications[1]->getId()));
    }

    /**
     * @covers Snide\Monitoring\Manager\ApplicationManager::findAll
     */
    public function testFindAll()
    {
        $this->assertEquals(array(), $this->object->findAll());
        $application = $this->object->createNew();
        $application->setName('My app');
        $application->setUrl('http://localhost');
        $this->object->create($application);
        $application->setId(1);
        $applicationTwo = $this->object->createNew();
        $applicationTwo->setName('My app 2');
        $applicationTwo->setUrl('http://localhost/2');
        $this->object->create($applicationTwo);
        $applicationTwo->setId(2);
        $this->assertEquals(sizeof(array($application, $applicationTwo)), sizeof($this->object->findAll()));
    }

    /**
     * @covers Snide\Monitoring\Manager\ApplicationManager::update
     */
    public function testUpdate()
    {
        $application = $this->object->createNew();
        $application->setName('My app');
        $application->setUrl('http://localhost');
        $this->object->create($application);
        $application = $this->object->find(1);
        $this->assertEquals('My app', $application->getName());
        $application->setName('My new app');
        $this->object->update($application);
        $application = $this->object->find(1);
        $this->assertEquals('My new app', $application->getName());
    }
}
