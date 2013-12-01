<?php

namespace Snide\Monitoring\Test\File;

/**
 * Class PermissionTest
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class PermissionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Permission
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $fileperms = substr(sprintf('%o', fileperms(__FILE__)), -3);
        $this->object = new Permission('Permission test', __FILE__, array($fileperms));
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Snide\Monitoring\Test\File\Permission::__construct
     */
    public function testConstruct()
    {
        $this->assertEquals('Permission test', $this->object->getIdentifier());
        $this->assertEquals(array(substr(sprintf('%o', fileperms(__FILE__)), -3)), $this->object->getPermissions());
        $this->assertEquals(__FILE__, $this->object->getPath());
    }

    /**
     * @covers Snide\Monitoring\Test\File\Permission::execute
     */
    public function testExecute()
    {
        $this->assertTrue($this->object->isExecutable());
        try {
            $this->object->execute();
        } catch(\Exception $e) {
            $this->fail($e->getMessage());
        }

        $this->object->setPermissions(array('111'));
        try {
            $this->object->execute();
            $this->fail('No exception thrown');
        } catch(\Exception $e) {

        }

        // no existing file
        $this->object->setPath(__FILE__.'/test');
        try {
            $this->object->execute();
            $this->fail('No exception thrown for unexisting file');
        } catch(\Exception $e) {

        }
    }

    /**
     * @covers Snide\Monitoring\Test\File\Permission::getPath
     * @covers Snide\Monitoring\Test\File\Permission::setPath
     */
    public function testGetSetPath()
    {
        $this->assertEquals(__FILE__, $this->object->getPath());
        $file = '/tmp';
        $this->object->setPath($file);
        $this->assertEquals($file, $this->object->getPath());
    }

    /**
     * @covers Snide\Monitoring\Test\File\Permission::getPermissions
     * @covers Snide\Monitoring\Test\File\Permission::setPermissions
     */
    public function testGetSetPermissions()
    {
        $fileperms = array(substr(sprintf('%o', fileperms(__FILE__)), -3));
        $this->assertEquals($fileperms, $this->object->getPermissions());
        $fileperms = array('755', '777');
        $this->object->setPermissions($fileperms);
        $this->assertEquals($fileperms, $this->object->getPermissions());
    }
}