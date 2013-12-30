<?php

/*
 * This file is part of the Snide monitoring package.
 *
 * (c) Pascal DENIS <pascal.denis.75@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Snide\Monitoring\Loader;

/**
 * Class TestLoaderTest
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
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
     * @covers Snide\Monitoring\Loader\TestLoader::loadByApplication
     * @covers Snide\Monitoring\Loader\TestLoader::loadTests
     */
    public function testLoadByApplication()
    {

    }
}
