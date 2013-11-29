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
     * Filtered Category
     *
     * @var array
     */
    protected $filteredCategory;

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
     * Add a list of tests to the list
     *
     * @param array $tests List of tests
     */
    public function addTests(array $tests)
    {
        foreach($tests as $test) {
            $this->addTest($test);
        }
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
        if(null != $this->getFilteredCategory()) {
            $tests = array();
            // Filter tests
            foreach($this->tests as $test) {
                if($test->getCategory() == $this->getFilteredCategory()) {
                    $tests[] = $test;
                }
            }
            return $tests;
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
        $this->tests = array();
        foreach($tests as $test) {
            $this->addTest($test);
        }
    }

    /**
     * Getter filteredCategory
     *
     * @return array
     */
    public function getFilteredCategory()
    {
        return $this->filteredCategory;
    }

    /**
     * Setter filteredCategory
     *
     * @param $filteredCategory A test category used to filter tests
     */
    public function setFilteredCategory($filteredCategory)
    {
        $this->filteredCategory = $filteredCategory;
    }

    public function getCategories()
    {
        $categories = array();
        foreach($this->getTests() as $test) {
            $categories[$test->getCategory()] = ucFirst($test->getCategory());
        }

        return $categories;
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
     * Get not critical tests (Get failed tests without tests define as critical)
     *
     * @return array List of tests
     */
    public function getNotCriticalFailedTests()
    {
        $criticTests = array();
        foreach($this->getTests() as $test) {
            if(!$test->isCritic() && $test->hasFailed()) {
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
     * Get tests as json format
     */
    public function getTestsAsJson()
    {
        $data = array();
        foreach($this->getTests() as $test) {
            $row = array(
                'identifier' => (string) $test->getIdentifier(),
                'critic'     => (bool) $test->isCritic(),
                'category'   => (string) $test->getCategory()
            );

            if($test->hasFailed()) {
                $row['exception'] = array(
                    'message' => $test->getException()->getMessage(),
                    'code'    => $test->getException()->getCode()
                );
            }
            $data[] = $row;
        }

        return json_encode(array('tests' => $data));
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