<?php

/*
 * This file is part of the Snide monitoring package.
 *
 * (c) Pascal DENIS <pascal.denis.75@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Snide\Monitoring\Model;

use Snide\Monitoring\Test\Environment;
use Snide\Monitoring\Test\Generic;

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
        $this->assertNull($this->object->getException());
        $exception = new \Exception('An exception');
        $this->object->setException($exception);
        $this->assertEquals($exception, $this->object->getException());
    }

    /**
     * @covers Snide\Monitoring\Model\Application::getId
     * @covers Snide\Monitoring\Model\Application::setId
     */
    public function testGetSetId()
    {
        $this->assertNull($this->object->getId());
        $id = 1;
        $this->object->setId($id);
        $this->assertEquals($id, $this->object->getId());
    }

    /**
     * @covers Snide\Monitoring\Model\Application::getName
     * @covers Snide\Monitoring\Model\Application::setName
     */
    public function testGetSetName()
    {
        $this->assertNull($this->object->getName());
        $name = 'my app';
        $this->object->setName($name);
        $this->assertEquals($name, $this->object->getName());
    }

    /**
     * @covers Snide\Monitoring\Model\Application::getUrl
     * @covers Snide\Monitoring\Model\Application::setUrl
     */
    public function testGetSetUrl()
    {
        $this->assertNull($this->object->getUrl());
        $url = 'http://localhost';
        $this->object->setUrl($url);
        $this->assertEquals($url, $this->object->getUrl());
    }

    /**
     * @covers Snide\Monitoring\Model\Application::getTests
     * @covers Snide\Monitoring\Model\Application::setTests
     * @covers Snide\Monitoring\Model\Application::addTest
     */
    public function testGetSetTests()
    {
        $this->assertEquals(array(), $this->object->getTests());
        $test = new Environment('TEST', 'TEST');
        $this->object->addTest($test);
        $this->assertEquals(array($test), $this->object->getTests());
        $tests = array(new Environment('TEST', 'TEST'), new Environment('TEST2', 'TEST2'));
        $this->object->setTests($tests);
        $this->assertEquals($tests, $this->object->getTests());
    }

    /**
     * @covers Snide\Monitoring\Model\Application::isWorking
     */
    public function testIsWorking()
    {
        $this->assertTrue($this->object->isWorking());
        $exception = new \Exception('An exception');
        $this->object->setException($exception);
        $this->assertFalse($this->object->isWorking());
        $this->object = new Application();

        $test = new Environment('TEST', 'TEST');
        $this->object->addTest($test);
        $this->assertTrue($this->object->isWorking());
        $test->setException($exception);
        $this->object->addTest($test);
        $this->assertFalse($this->object->isWorking());

    }
}
