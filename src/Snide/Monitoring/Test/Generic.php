<?php


namespace Snide\Monitoring\Test;

use Snide\Monitoring\Model\Test;


/**
 * Class Generic
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class Generic extends Test
{

    /**
     * Constructor
     *
     * @param array $data List of object properties as array
     */
    public function __construct($data = array())
    {
        if (isset($data['category'])) {
            $this->category = $data['category'];
        }

        if (isset($data['exception']['code']) && isset($data['exception']['message'])) {
            $this->exception = new \Exception(
                $data['exception']['message'],
                $data['exception']['code']
            );
        }

        if (isset($data['identifier'])) {
            $this->identifier = $data['identifier'];
        }

        if (isset($data['critic'])) {
            $this->critic = $data['critic'];
        }

        $this->executable = false;
    }

    /**
     * Execute a test
     *
     * @throws \Exception
     * @return void
     */
    public function execute()
    {
        throw new \Exception('Generic test cannot be executed');
    }
}