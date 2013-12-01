<?php

namespace Snide\Monitoring\Manager;

use Snide\Monitoring\Executor\TestExecutor;
use Snide\Monitoring\Executor\TestExecutorInterface;
use Snide\Monitoring\Test\Environment;

/**
 * Class TestManagerTest
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class TestManagerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var TestManager
     */
    protected $object;

    /**
     * @var TestExecutorInterface
     */
    protected $executor;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->executor = new TestExecutor();
        $this->object = new TestManager($this->executor);
    }

    /**
     * @covers Snide\Monitoring\Manager\TestManager::__construct
     * @covers Snide\Monitoring\Manager\TestManager::GetExecutor
     */
    public function testConstruct()
    {
        $this->assertEquals($this->executor, $this->object->getExecutor());
    }
    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Snide\Monitoring\Manager\TestManager::addTest
     */
    public function testAddTest()
    {
        $this->assertEquals(array(), $this->object->getTests());
        $test = new Environment('TEST', 'ENV');
        $this->object->addTest($test);
        $this->assertEquals(array($test), $this->object->getTests());
    }


    /**
     * @covers Snide\Monitoring\Manager\TestManager::addTests
     */
    public function testAddTests()
    {
        $this->assertEquals(array(), $this->object->getTests());
        $tests = array(new Environment('TEST', 'ENV'), new Environment('TEST2', 'ENV'));
        $this->object->addTests($tests);
        $this->assertEquals($tests, $this->object->getTests());
    }

    /**
     * @covers Snide\Monitoring\Manager\TestManager::getTests
     * @covers Snide\Monitoring\Manager\TestManager::setTests
     */
    public function testgetSetTests()
    {
        $this->assertEquals(array(), $this->object->getTests());
        $test = new Environment('TEST2', 'ENV');
        $test->setCategory('onecategory');
        $tests = array(new Environment('TEST', 'ENV'), $test);
        $this->object->setTests($tests);
        $this->assertEquals($tests, $this->object->getTests());

        $this->object->setFilteredCategory('onecategory');
        $this->assertEquals(array($test), $this->object->getTests());
    }

    /**
     * @covers Snide\Monitoring\Manager\TestManager::getFilteredCategory
     * @covers Snide\Monitoring\Manager\TestManager::setFilteredCategory
     */
    public function testGetSetFilteredCategory()
    {
        $this->assertNull($this->object->getFilteredCategory());
        $test = new Environment('TEST', 'TEST');
        $test->setCategory('onecategory');
        $unknownTest = new Environment('TEST2', 'ENV');
        $tests = array($test, $unknownTest);
        $this->object->setTests($tests);

        $category = 'onecategory';
        $this->object->setFilteredCategory($category);
        $this->assertEquals($category, $this->object->getFilteredCategory());
        $this->assertEquals(array($test), $this->object->getFilteredTests());
    }

    /**
     * @covers Snide\Monitoring\Manager\TestManager::getFilteredTests
     */
    public function testGetFilteredTests()
    {
        $this->assertEquals(array(), $this->object->getFilteredTests());
        $test = new Environment('TEST', 'TEST');
        $test->setCategory('onecategory');
        $unknownTest = new Environment('TEST2', 'ENV');
        $tests = array($test, $unknownTest);
        $this->object->setTests($tests);

        $this->object->setFilteredCategory('onecategory');
        $this->assertEquals(array($test), $this->object->getFilteredTests());
    }

    /**
     * @covers Snide\Monitoring\Manager\TestManager::getCategories
     */
    public function testGetCategories()
    {
        $this->assertEquals(array(), $this->object->getCategories());

        $test = new Environment('TEST', 'TEST');
        $test->setCategory('onecategory');
        $unknownTest = new Environment('TEST2', 'ENV');
        $tests = array($test, $unknownTest);
        $this->object->addTests($tests);
        $this->assertEquals(array('onecategory' => 'Onecategory', 'unknown' => 'Unknown'), $this->object->getCategories());
    }

    /**
     * @covers Snide\Monitoring\Manager\TestManager::getSuccessTests
     */
    public function testGetSuccessTests()
    {
        $this->assertEquals(array(), $this->object->getSuccessTests());
        $test = new Environment('TEST', 'TEST');
        $test->setCategory('onecategory');
        $unknownTest = new Environment('TEST2', 'ENV');
        $unknownTest->setException(new \Exception('An exception'));
        $tests = array($test, $unknownTest);
        $this->object->setTests($tests);
        $this->assertEquals(array($test), $this->object->getSuccessTests());
    }

    /**
     * @covers Snide\Monitoring\Manager\TestManager::getCriticalFailedTests
     */
    public function testGetCriticalFailedTests()
    {
        $this->assertEquals(array(), $this->object->getCriticalFailedTests());
        $test = new Environment('TEST', 'TEST');
        $test->setCategory('onecategory');
        $test->setException(new \Exception('An exception'));
        $test->setCritic(true);

        $unknownTest = new Environment('TEST2', 'ENV');
        $unknownTest->setException(new \Exception('An exception'));
        $anotherTest = new Environment('TEST2', 'ENV');
        $anotherTest->setCritic(true);
        $tests = array($test, $unknownTest, $anotherTest);
        $this->object->setTests($tests);
        $this->assertEquals(array($test), $this->object->getCriticalFailedTests());

    }

    /**
     * @covers Snide\Monitoring\Manager\TestManager::getNotCriticalFailedtests
     */
    public function testGetNotCriticalFailedTests()
    {
        $this->assertEquals(array(), $this->object->getNotCriticalFailedTests());
        $test = new Environment('TEST', 'TEST');
        $test->setCategory('onecategory');
        $test->setException(new \Exception('An exception'));
        $test->setCritic(true);

        $unknownTest = new Environment('TEST2', 'ENV');
        $unknownTest->setException(new \Exception('An exception'));
        $anotherTest = new Environment('TEST2', 'ENV');
        $anotherTest->setCritic(true);
        $tests = array($test, $unknownTest, $anotherTest);
        $this->object->setTests($tests);
        $this->assertEquals(array($unknownTest), $this->object->getNotCriticalFailedTests());
    }

    /**
     * @covers Snide\Monitoring\Manager\TestManager::getCriticalTests
     */
    public function testGetCriticalTests()
    {
        $this->assertEquals(array(), $this->object->getCriticalTests());
        $test = new Environment('TEST', 'TEST');
        $test->setCategory('onecategory');
        $test->setException(new \Exception('An exception'));
        $test->setCritic(true);

        $unknownTest = new Environment('TEST2', 'ENV');
        $unknownTest->setException(new \Exception('An exception'));
        $anotherTest = new Environment('TEST2', 'ENV');
        $anotherTest->setCritic(true);
        $tests = array($test, $unknownTest, $anotherTest);
        $this->object->setTests($tests);
        $this->assertEquals(array($test, $anotherTest), $this->object->getCriticalTests());
    }

    /**
     * @covers Snide\Monitoring\Manager\TestManager::getFailedTests
     */
    public function testGetFailedTests()
    {
        $this->assertEquals(array(), $this->object->getFailedTests());
        $test = new Environment('TEST', 'TEST');
        $test->setCategory('onecategory');
        $test->setException(new \Exception('An exception'));
        $test->setCritic(true);

        $unknownTest = new Environment('TEST2', 'ENV');
        $unknownTest->setException(new \Exception('An exception'));
        $anotherTest = new Environment('TEST2', 'ENV');
        $anotherTest->setCritic(true);
        $tests = array($test, $unknownTest, $anotherTest);
        $this->object->setTests($tests);
        $this->assertEquals(array($test, $unknownTest), $this->object->getFailedTests());
    }

    /**
     * @covers Snide\Monitoring\Manager\TestManager::getTestsAsJson
     */
    public function testGetTestsAsJson()
    {
        $test = new Environment('TEST', 'TEST');
        $test->setCategory('onecategory');
        $test->setException(new \Exception('An exception', 0));
        $test->setCritic(true);
        $anotherTest = new Environment('TEST2', 'ENV');
        $anotherTest->setCritic(true);
        $anotherTest->setExecutable(false);
        $tests = array($test, $anotherTest);
        $this->object->setTests($tests);
        $data = json_encode(
            array(
                'tests' => array(
                    array(
                        'identifier' => 'TEST',
                        'critic'     => true,
                        'category'   => 'onecategory',
                        'exception'  => array(
                            'message' => 'An exception',
                            'code'    => 0
                        )
                    ),
                    array(
                        'identifier'  => 'TEST2',
                        'critic'      => true,
                        'category'    => 'unknown',
                    )
                )
            )
        );
        $this->assertEquals($data, $this->object->getTestsAsJson());
    }

    /**
     * @covers Snide\Monitoring\Manager\TestManager::getExecutableTests
     */
    public function testGetExecutableTests()
    {
        $this->assertEquals(array(), $this->object->getExecutableTests());
        $test = new Environment('TEST', 'TEST');
        $test->setCategory('onecategory');
        $test->setException(new \Exception('An exception'));
        $test->setCritic(true);

        $unknownTest = new Environment('TEST2', 'ENV');
        $unknownTest->setException(new \Exception('An exception'));
        $anotherTest = new Environment('TEST2', 'ENV');
        $anotherTest->setCritic(true);
        $anotherTest->setExecutable(false);
        $tests = array($test, $unknownTest, $anotherTest);
        $this->object->setTests($tests);
        $this->assertEquals(array($test, $unknownTest), $this->object->getExecutableTests());
    }

    /**
     * @covers Snide\Monitoring\Manager\TestManager::executeTests
     */
    public function testExecuteTests()
    {
        $test = new Environment('TEST', 'ENVNOTFOUND');
        $test->setCategory('onecategory');
        $test->setCritic(true);

        $unknownTest = new Environment('TEST2', 'ENVNOTFOUND');
        $anotherTest = new Environment('TEST2', 'ENV2NOTFOUND');
        $anotherTest->setCritic(true);
        $anotherTest->setExecutable(false);
        $tests = array($test, $unknownTest, $anotherTest);
        $this->object->setTests($tests);

        $this->assertNull($test->getException());
        $this->assertNull($unknownTest->getException());
        $this->assertNull($anotherTest->getException());

        $this->object->executeTests();

        $this->assertNotNull($test->getException());
        $this->assertNotNull($unknownTest->getException());
        $this->assertNull($anotherTest->getException());

    }
}
