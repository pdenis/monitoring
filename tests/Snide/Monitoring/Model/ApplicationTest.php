<?php

namespace Snide\Monitoring\Model;

/**
 * Class ApplicationTest
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class ApplicationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Application
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {

        $this->object = new Application();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }


    /**
     * @covers Snide\Monitoring\Model\Application::getException
     * @covers Snide\Monitoring\Model\Application::setException
     */
    public function testGetSetException()
    {
    }

    /**
     * @covers Snide\Monitoring\Model\Application::getId
     * @covers Snide\Monitoring\Model\Application::setId
     */
    public function testGetSetId()
    {
    }

    /**
     * @covers Snide\Monitoring\Model\Application::getName
     * @covers Snide\Monitoring\Model\Application::setName
     */
    public function testGetSetName()
    {
    }

    /**
     * @covers Snide\Monitoring\Model\Application::getUrl
     * @covers Snide\Monitoring\Model\Application::setUrl
     */
    public function testGetSetUrl()
    {
    }

    /**
     * @covers Snide\Monitoring\Model\Application::addTest
     */
    public function testAddTest()
    {
    }

    /**
     * @covers Snide\Monitoring\Model\Application::getTests
     * @covers Snide\Monitoring\Model\Application::setTests
     */
    public function testGetSetTests()
    {
    }

    /**
     * @covers Snide\Monitoring\Model\Application::isWorking
     */
    public function testIsWorking()
    {
    }
}