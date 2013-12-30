<?php

/*
 * This file is part of the Snide monitoring package.
 *
 * (c) Pascal DENIS <pascal.denis.75@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
