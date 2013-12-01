<?php

namespace Snide\Monitoring\Test;

/**
 * Class RedisTest
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
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
     * @covers Snide\Monitoring\Test\Redis::__construct
     */
    public function testConstruct()
    {
        $this->assertEquals('Redis test', $this->object->getIdentifier());
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }


    /**
     * @covers Snide\Monitoring\Test\Redis::execute
     */
    public function testExecute()
    {
        $this->assertTrue($this->object->isExecutable());
        try {
            $this->object->execute();
        } catch(\Exception $e) {
            $this->fail($e->getMessage());
        }

        // no existing file
        $this->object = new Redis('Redis test', '127.0.0.1', '611379');
        try {
            $this->object->execute();
            $this->fail('No exception thrown for unexisting port');
        } catch(\Exception $e) {

        }
    }
}
