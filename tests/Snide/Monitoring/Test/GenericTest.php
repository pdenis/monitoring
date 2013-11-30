<?php

namespace Snide\Monitoring\Test;

/**
 * Class GenericTest
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class GenericTest extends \PHPUnit_Framework_TestCase
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
     * @covers Snide\Monitoring\Test\File\Generic::execute
     */
    public function testExecute()
    {
    }
}