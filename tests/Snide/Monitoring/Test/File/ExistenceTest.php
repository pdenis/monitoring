<?php

/*
 * This file is part of the Snide monitoring package.
 *
 * (c) Pascal DENIS <pascal.denis.75@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Snide\Monitoring\Test\File;

/**
 * Class ExistenceTest
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class ExistenceTest extends \PHPUnit_Framework_TestCase
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
     * @covers Snide\Monitoring\Test\File\Existence::__construct
     */
    public function testConstruct()
    {
        $this->assertEquals('EXISTENCE TEST', $this->object->getIdentifier());
        $this->assertEquals(__FILE__, $this->object->getPath());
    }

    /**
     * @covers Snide\Monitoring\Test\File\Existence::execute
     */
    public function testExecute()
    {
        $this->assertTrue($this->object->isExecutable());
        try {
            $this->object->execute();
        } catch(\Exception $e) {
            $this->fail($e->getMessage());
        }

        $this->object->setPath('/'.time());
        try {
            $this->object->execute();
            $this->fail('No exception thrown');
        } catch(\Exception $e) {

        }
    }

    /**
     * @covers Snide\Monitoring\Test\File\Existence::getPath
     * @covers Snide\Monitoring\Test\File\Existence::setPath
     */
    public function testGetSetPath()
    {
        $file = '/tmp';
        $this->object->setPath($file);
        $this->assertEquals($file, $this->object->getPath());
    }
}
