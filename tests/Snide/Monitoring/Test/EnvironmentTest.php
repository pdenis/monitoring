<?php

namespace Snide\Monitoring\Test;

/**
 * Class EnvironmentTest
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
class EnvironmentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Environment
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Environment('Environment test', 'TYPE_ENV');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }


    /**
     * @covers Snide\Monitoring\Test\File\Environment::execute
     */
    public function testExecute()
    {
    }

    /**
     * @covers Snide\Monitoring\Test\File\Environment::getKey
     * @covers Snide\Monitoring\Test\File\Environment::setKey
     */
    public function testGetSetKey()
    {
    }

    /**
     * @covers Snide\Monitoring\Test\File\Existence::getPermissions
     * @covers Snide\Monitoring\Test\File\Existence::setPermissions
     */
    public function testGetSetPermissions()
    {
    }

}