<?php

namespace Snide\Monitoring\Test;

/**
 * Class RedisTest
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
class RedisTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Redis
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Redis('Redis test', '127.0.0.1', '6379');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }


    /**
     * @covers Snide\Monitoring\Test\File\Redis::execute
     */
    public function testExecute()
    {
    }
}