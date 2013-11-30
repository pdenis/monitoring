<?php

namespace Snide\Monitoring\Test\File;

/**
 * Class Existence
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
class Existence extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Existence
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Existence('EXISTENCE TEST', __FILE__);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }


    /**
     * @covers Snide\Monitoring\Test\File\Existence::execute
     */
    public function testExecute()
    {
    }

    /**
     * @covers Snide\Monitoring\Test\File\Existence::getPath
     * @covers Snide\Monitoring\Test\File\Existence::setPath
     */
    public function testGetSetPath()
    {
    }
}