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

use Snide\Monitoring\Model\Application;

/**
 * Interface TestLoaderInterface
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
interface TestLoaderInterface
{
    /**
     * Load Test for an application
     *
     * @param Application $application
     */
    public function loadByApplication(Application $application);
}
