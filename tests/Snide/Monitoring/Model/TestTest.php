<?php

namespace Snide\Monitoring\Model;
use Snide\Monitoring\Test\Generic;

/**
 * Class TestTest
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
class TestTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Generic
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {

        $this->object = new Generic();
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
     * @covers Snide\Monitoring\Model\Application::getCategory
     * @covers Snide\Monitoring\Model\Application::setCategory
     */
    public function getCategory()
    {
    }

    /**
     * @covers Snide\Monitoring\Model\Application::hasFailed
     */
    public function testHasFailed()
    {
    }


    /**
     * @covers Snide\Monitoring\Model\Application::getIdentifier
     * @covers Snide\Monitoring\Model\Application::setIdentifier
     */
    public function testGetSetIdentifier()
    {
    }

    /**
     * @covers Snide\Monitoring\Model\Application::isExecutable
     * @covers Snide\Monitoring\Model\Application::setExecutable
     */
    public function testGetSetExecutable()
    {
    }

    /**
     * @covers Snide\Monitoring\Model\Application::isCritic
     * @covers Snide\Monitoring\Model\Application::setCritic
     */
    public function testGetSetCritic()
    {
    }
}