<?php

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
        $data = array();
        try {
            $client = new Client($application->getUrl());
            $data = json_decode($client->get()->send()->getBody(true), true);
        } catch (\Exception $e) {
            $application->setException($e);
        }

        if (isset($data['tests']) && is_array($data['tests'])) {
            foreach ($data['tests'] as $test) {
                $application->addTest(new Generic($test));
            }
        }
    }

}
