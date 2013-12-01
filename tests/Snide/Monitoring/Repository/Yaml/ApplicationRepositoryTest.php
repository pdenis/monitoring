<?php

namespace Snide\Monitoring\Repository\Yaml;

use Snide\Monitoring\Model\Application;

/**
 * Class ApplicationRepositoryTest
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class ApplicationRepositoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ApplicationRepository
     */
    protected $object;
    /**
     * Filename
     *
     * @var string
     */
    protected $filename;

    /**
     * Class
     *
     * @var string
     */
    protected $class;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->filename = '/tmp/filename.yml';
        $this->class = 'Snide\\Monitoring\\Model\\Application';

        if(file_exists($this->filename)) {
            unlink($this->filename);
        }
        $this->object = new ApplicationRepository($this->class, $this->filename);
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
     * @covers Snide\Monitoring\Repository\Yaml\ApplicationRepository::__construct
     * @covers Snide\Monitoring\Repository\Yaml\ApplicationRepository::createNew
     */
    public function testConstruct()
    {
        $this->assertTrue(file_exists($this->filename));
        $this->assertInstanceOf($this->class, $this->object->createNew());

    }

    /**
     * @covers Snide\Monitoring\Repository\Yaml\ApplicationRepository::findAll
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
        $this->assertEquals(array($application, $applicationTwo), $this->object->findAll());
    }

    /**
     * @covers Snide\Monitoring\Repository\Yaml\ApplicationRepository::find
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

        $this->assertEquals($applications[1], $this->object->find($applications[1]->getId()));
    }

    /**
     * @covers Snide\Monitoring\Repository\Yaml\ApplicationRepository::create
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

        $this->assertEquals($applications, $this->object->findAll());

    }

    /**
     * @covers Snide\Monitoring\Repository\Yaml\ApplicationRepository::delete
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
        $this->assertEquals(array_values($applications), $this->object->findAll());
    }

    /**
     * @covers Snide\Monitoring\Repository\Yaml\ApplicationRepository::update
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
