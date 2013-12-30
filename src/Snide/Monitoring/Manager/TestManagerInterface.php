<?php

/*
 * This file is part of the Snide monitoring package.
 *
 * (c) Pascal DENIS <pascal.denis.75@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Snide\Monitoring\Manager;

use Snide\Monitoring\Model\Test;

/**
 * Interface TestManagerInterface
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
interface TestManagerInterface
{
    /**
     * Add a test to the list
     *
     * @param Test $test A test
     */
    public function addTest(Test $test);

    /**
     * Add a list of tests to the list
     *
     * @param array $tests List of tests
     */
    public function addTests(array $tests);

    /**
     * Getter tests
     *
     * @return array
     */
    public function getTests();

    /**
     * Setter tests
     *
     * @param array $tests List of tests
     */
    public function setTests(array $tests);

    /**
     * Getter filteredCategory
     *
     * @return array
     */
    public function getFilteredCategory();

    /**
     * Setter filteredCategory
     *
     * @param $filteredCategory A test category used to filter tests
     */
    public function setFilteredCategory($filteredCategory);

    /**
     * Getter categories
     *
     * @return array
     */
    public function getCategories();

    /**
     * Get success tests
     *
     * @return array List of tests
     */
    public function getSuccessTests();

    /**
     * Get critical tests (Get failed tests define as critic test)
     *
     * @return array List of tests
     */
    public function getCriticalFailedTests();

    /**
     * Get not critical tests (Get failed tests without tests define as critical)
     *
     * @return array List of tests
     */
    public function getNotCriticalFailedTests();

    /**
     * Get critical tests
     *
     * @return array List of tests
     */
    public function getCriticalTests();

    /**
     * Get failed tests
     *
     * @return array List of tests
     */
    public function getFailedTests();

    /**
     * Get tests as json format
     */
    public function getTestsAsJson();

    /**
     * Get executable tests
     *
     * @return array List of tests
     */
    public function getExecutableTests();

    /**
     * Execute tests (Only executable tests)
     */
    public function executeTests();
}
