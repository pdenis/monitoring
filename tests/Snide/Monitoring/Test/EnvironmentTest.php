<?php

namespace Snide\Monitoring\Test;

/**
 * Class EnvironmentTest
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
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
     * @covers Snide\Monitoring\Test\Environment::__construct
     */
    public function testConstruct()
    {
        $this->assertEquals('Environment test', $this->object->getIdentifier());
        $this->assertEquals('TYPE_ENV', $this->object->getKey());
    }

    /**
     * @covers Snide\Monitoring\Test\Environment::execute
     */
    public function testExecute()
    {
        $this->assertTrue($this->object->isExecutable());
        $env = "dev";
        if (isset($_ENV["TYPE_ENV"])) {
            $env = $_ENV["TYPE_ENV"];
            unset($_ENV["TYPE_ENV"]);
        }

        try {
            $this->object->execute();
            $this->fail('No exception thrown');
        } catch(\Exception $e) {

        }

        $_ENV["TYPE_ENV"] = $env;
        try {
            $this->object->execute();

        } catch(\Exception $e) {
            $this->fail($e->getMessage());
        }


    }

    /**
     * @covers Snide\Monitoring\Test\Environment::getKey
     * @covers Snide\Monitoring\Test\Environment::setKey
     */
    public function testGetSetKey()
    {
        $this->object->setKey('NEW');
        $this->assertEquals('NEW', $this->object->getKey());
    }
}
