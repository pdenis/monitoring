<?php

namespace Snide\Monitoring\Executor;

use Snide\Monitoring\Test\Environment;

/**
 * Class TestExecutorTest
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class TestExecutorTest  extends \PHPUnit_Framework_TestCase
{
    /**
     * @var TestExecutor
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new TestExecutor();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Snide\Monitoring\Executor\TestExecutor::execute
     */
    public function testExecute()
    {
        $test = new Environment('identifier', 'ENV_NOT_FOUND_KEY');
        $this->object->execute($test);

        $this->assertInstanceOf('\Exception', $test->getException());
        $_ENV['ENV_NOT_FOUND_KEY'] = '1';
        $test = new Environment('identifier', 'ENV_NOT_FOUND_KEY');
        $this->object->execute($test);
        $this->assertNull($test->getException());
    }

}