<?php

namespace Snide\Monitoring\Repository\Yaml;

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
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new ApplicationRepository('Snide\\Monitoring\\Model\\Application', '/tmp/filename.yml');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }


    /**
     * @covers Snide\Monitoring\Repository\Yaml\ApplicationRepository::findAll
     */
    public function testFindAll()
    {
    }

    /**
     * @covers Snide\Monitoring\Repository\Yaml\ApplicationRepository::find
     */
    public function testFind()
    {
    }

    /**
     * @covers Snide\Monitoring\Repository\Yaml\ApplicationRepository::create
     */
    public function testCreate()
    {
    }

    /**
     * @covers Snide\Monitoring\Repository\Yaml\ApplicationRepository::delete
     */
    public function testDelete()
    {
    }

    /**
     * @covers Snide\Monitoring\Repository\Yaml\ApplicationRepository::update
     */
    public function testUpdate()
    {
    }

    /**
     * @covers Snide\Monitoring\Repository\Yaml\ApplicationRepository::createNew
     */
    public function testCreateNew()
    {
    }
}
