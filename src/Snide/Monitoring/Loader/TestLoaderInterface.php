<?php

namespace Snide\Monitoring\Loader;

use Snide\Monitoring\Model\Application;

/**
 * Interface TestLoaderInterface
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
interface TestLoaderInterface
{
    public function loadByApplication(Application $application);
}