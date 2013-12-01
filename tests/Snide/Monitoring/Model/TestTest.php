<?php

namespace Snide\Monitoring\Model;

use Snide\Monitoring\Test\Environment;

/**
 * Class TestTest
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class TestTest extends \PHPUnit_Framework_TestCase
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
        $this->object = new Environment('AN IDENTIFIER', 'KEY');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Snide\Monitoring\Model\Test::__construct
     */
    public function test__construct()
    {
        $this->assertEquals('AN IDENTIFIER', $this->object->getIdentifier());
        $this->assertTrue($this->object->isExecutable());
    }

    /**
     * @covers Snide\Monitoring\Model\Test::getException
     * @covers Snide\Monitoring\Model\Test::setException
     */
    public function testGetSetException()
    {
        $this->assertNull($this->object->getException());
        $exception = new \Exception('An exception');
        $this->object->setException($exception);
        $this->assertEquals($exception, $this->object->getException());
    }

    /**
     * @covers Snide\Monitoring\Model\Test::getCategory
     * @covers Snide\Monitoring\Model\Test::setCategory
     */
    public function testGetSetCategory()
    {
        $this->assertEquals('unknown', $this->object->getCategory());
        $category = 'another one';
        $this->object->setCategory($category);
        $this->assertEquals($category, $this->object->getCategory());
    }

    /**
     * @covers Snide\Monitoring\Model\Test::hasFailed
     */
    public function testHasFailed()
    {
        $this->assertFalse($this->object->hasFailed());
        $this->object->setException(new \Exception('An exception'));
        $this->assertTrue($this->object->hasFailed());
    }


    /**
     * @covers Snide\Monitoring\Model\Test::getIdentifier
     * @covers Snide\Monitoring\Model\Test::setIdentifier
     */
    public function testGetSetIdentifier()
    {
        $identifier = 'ANOTHER_IDENTIFIER';
        $this->object->setIdentifier($identifier);
        $this->assertEquals($identifier, $this->object->getIdentifier());
    }

    /**
     * @covers Snide\Monitoring\Model\Test::isExecutable
     * @covers Snide\Monitoring\Model\Test::setExecutable
     */
    public function testGetSetExecutable()
    {
        $this->assertTrue($this->object->isExecutable());
        $this->object->setExecutable(false);
        $this->assertFalse($this->object->isExecutable());
    }

    /**
     * @covers Snide\Monitoring\Model\Test::isCritic
     * @covers Snide\Monitoring\Model\Test::setCritic
     */
    public function testGetSetCritic()
    {
        $this->assertFalse($this->object->isCritic());
        $critic = true;
        $this->object->setCritic($critic);
        $this->assertTrue($critic);
    }
}
