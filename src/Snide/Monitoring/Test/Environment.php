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
 * Class Environment
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class Environment extends Test
{

    /**
     * $_ENV key to test
     *
     * @var string
     */
    protected $key;

    /**
     * Constructor
     *
     * @param string $identifier Test identifier
     * @param string $key key of $_ENV to test
     */
    public function __construct($identifier, $key)
    {
        $this->key = $key;
        parent::__construct($identifier);
    }

    /**
     * Test existence of env key
     *
     * @return boolean
     * @throws \Exception
     */
    public function execute()
    {
        if (!isset($_ENV[$this->key])) {
            throw new \Exception('Environment var ' . $this->key . ' does not exist');
        }
    }

    /**
     * Getter key
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Setter key
     *
     * @param string $key $_ZNV key to test
     */
    public function setKey($key)
    {
        $this->key = $key;
    }
}
