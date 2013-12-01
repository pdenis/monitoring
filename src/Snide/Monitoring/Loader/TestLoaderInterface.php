<?php

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
