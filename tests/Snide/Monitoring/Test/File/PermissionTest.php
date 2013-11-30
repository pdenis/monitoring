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
        $this->object = new Permission('Permission test', __FILE__, array());
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }


    /**
     * @covers Snide\Monitoring\Test\File\Permission::execute
     */
    public function testExecute()
    {
    }

    /**
     * @covers Snide\Monitoring\Test\File\Permission::getPath
     * @covers Snide\Monitoring\Test\File\Permission::setPath
     */
    public function testGetSetPath()
    {
    }

    /**
     * @covers Snide\Monitoring\Test\File\Permission::getPermissions
     * @covers Snide\Monitoring\Test\File\Permission::setPermissions
     */
    public function testGetSetPermissions()
    {
    }
}