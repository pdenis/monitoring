<?php


namespace Snide\Monitoring\Executor;

use Snide\Monitoring\Model\Test;
use Snide\Monitoring\Test\ExecutorInterface;

/**
 * Class TestExecutor
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
class TestExecutor implements TestExecutorInterface
{
    /**
     * Execute a test (and save exception if necessary)
     *
     * @param Test $test Test to execute
     */
    public function execute(Test $test)
    {
        try {
            // Execute test
            $test->execute();
        }catch (\Exception $e) {
            // Set exception
            $test->setException($e);
        }
    }
}