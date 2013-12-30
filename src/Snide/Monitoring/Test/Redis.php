<?php

/*
 * This file is part of the Snide monitoring package.
 *
 * (c) Pascal DENIS <pascal.denis.75@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Snide\Monitoring\Test;

use Snide\Monitoring\Model\Test;

/**
 * Class Redis
 *
 * Test based on phpredis extension
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class Redis extends Test
{

    /**
     * Server host
     *
     * @var string
     */
    protected $host;
    /**
     * Server port
     *
     * @var string
     */
    protected $port;

    /**
     * Constructor
     *
     * @param string $identifier
     * @param $host Redis host
     * @param $port Redis port
     */
    public function __construct($identifier, $host, $port)
    {
        $this->host = $host;
        $this->port = $port;

        parent::__construct($identifier);
    }

    /**
     * Execute a test
     *
     * @throws \Exception
     * @return void
     */
    public function execute()
    {
        $client = new \Redis();

        $client->connect(
            $this->host,
            $this->port
        );

        // Ping server
        $client->ping();

        // check if server instance is writable
        if (!$this->isWritable($client)) {
            throw new \Exception('Read only system (check memory_used)', 1);
        }
    }

    /**
     * Check if Redis instance is writable
     *
     * @param $client Redis client
     * @return bool
     */
    protected function isWritable($client)
    {
        // Write test (for readonly pb)
        $key = 'monitor_key';
        $content = 'VALUE_MONITOR';
        $client->set($key, $content);

        $ret = $client->get($key);
        // Remove key after the test
        $client->delete($key);

        return (null != $ret);
    }
}
