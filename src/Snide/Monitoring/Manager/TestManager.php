<?php


namespace Snide\Monitoring\Manager;

use Snide\Monitoring\Model\Test;
use Snide\Monitoring\Executor\TestExecutorInterface;

/**
 * Class TestManager
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
class TestManager
{
    /**
     * Test executor
     *
     * @var TestExecutorInterface
     */
    protected $executor;

    /**
     * List of tests
     *
     * @var array
     */
    protected $tests;

    /**
     * Constructor
     *
     * @param TestExecutorInterface $executor Test executor
     */
    public function __construct(TestExecutorInterface $executor)
    {
        $this->executor = $executor;
    }

    /**
     * Add a test to the list
     *
     * @param Test $test A test
     */
    public function addTest(Test $test)
    {
        $this->tests[] = $test;
    }

    /**
     * Getter tests
     *
     * @return array
     */
    public function getTests()
    {
        if(!is_array($this->tests)) {
            $this->tests = array();
        }
        return $this->tests;
    }

    /**
     * Setter tests
     *
     * @param array $tests List of tests
     */
    public function setTests(array $tests)
    {
        foreach($tests as $test) {
            $this->addTest($test);
        }
    }

    /**
     * Get success tests
     *
     * @return array List of tests
     */
    public function getSuccessTests()
    {
        $successTests = array();
        foreach($this->getTests() as $test) {
            if(!$test->hasFailed()) {
                $successTests[] = $test;
            }
        }

        return $successTests;
    }

    /**
     * Get critical tests (Get failed tests define as critic test)
     *
     * @return array List of tests
     */
    public function getCriticalFailedTests()
    {
        $criticTests = array();
        foreach($this->getTests() as $test) {
            if($test->isCritic() && $test->hasFailed()) {
                $criticTests[] = $test;
            }
        }

        return $criticTests;
    }

    /**
     * Get critical tests
     *
     * @return array List of tests
     */
    public function getCriticalTests()
    {
        $criticTests = array();
        foreach($this->getTests() as $test) {
            if($test->isCritic()) {
                $criticTests[] = $test;
            }
        }

        return $criticTests;
    }

    /**
     * Get failed tests
     *
     * @return array List of tests
     */
    public function getFailedTests()
    {
        $failedTests = array();

        foreach($this->getTests() as $test) {

            if($test->hasFailed()) {
                $failedTests[] = $test;
            }
        }


        return $failedTests;
    }

    /**
     * Get executable tests
     *
     * @return array List of tests
     */
    public function getExecutableTests()
    {
        $executableTests = array();
        foreach($this->getTests() as $test) {
            if($test->isExecutable()) {
                $executableTests[] = $test;
            }
        }

        return $executableTests;
    }

    /**
     * Execute tests (Only executable tests)
     */
    public function executeTests()
    {
        // Run all of executable tests
        foreach($this->getExecutableTests() as $test) {
            $this->executor->execute($test);
        }
    }
}