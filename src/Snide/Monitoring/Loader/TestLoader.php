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

use Guzzle\Http\Client;
use Snide\Monitoring\Model\Application;
use Snide\Monitoring\Test\Generic;

/**
 * Class TestLoader
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class TestLoader implements TestLoaderInterface
{
    /**
     * Load Test for an application using Guzzle\Http\Client and JSON format
     *
     * @param Application $application
     */
    public function loadByApplication(Application $application)
    {
        try {
            $client = new Client($application->getUrl());
            $data = json_decode($client->get()->send()->getBody(true), true);
            $this->loadTests($application, $data);
        } catch (\Exception $e) {
            $application->setException($e);
        }
    }

    /**
     * Load tests for an app
     *
     * @param Application $application
     * @param array $data
     */
    protected function loadTests(Application $application, $data = array())
    {
        if (isset($data['tests']) && is_array($data['tests'])) {
            foreach ($data['tests'] as $test) {
                $application->addTest(new Generic($test));
            }
        }
    }
}
