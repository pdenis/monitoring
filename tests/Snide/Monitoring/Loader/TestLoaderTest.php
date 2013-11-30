<?php

namespace Snide\Monitoring\Loader;

/**
 * Class TestLoaderTest
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
class TestLoaderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var TestLoader
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new TestLoader();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }


    /**
     * @covers Snide\Monitoring\Executor\TestExecutor::loadByApplication
     */
    public function testLoadByApplication()
    {

    }
}