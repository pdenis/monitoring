<?php

namespace Snide\Monitoring\Executor;

use Snide\Monitoring\Model\Test;

/**
 * Interface TestExecutorInterface
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
interface TestExecutorInterface
{
    /**
     * Execute a test (and save exception if necessary)
     *
     * @param Test $test Test to execute
     */
    public function execute(Test $test);

}
