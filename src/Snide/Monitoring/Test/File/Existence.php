<?php

namespace Snide\Monitoring\Test\File;

use Snide\Monitoring\Model\Test;

/**
 * Class ExistenceTest
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
class ExistenceTest extends Test
{
    /**
     * File or folder path
     *
     * @var string
     */
    protected $path;

    /**
     * Constructor
     *
     * @param string $identifier Test identifier
     * @param $path File or folder path
     */
    public function __construct($identifier, $path)
    {
        $this->path = $path;
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
        if(!file_exists($this->path)) {
            throw new \Exception(sprintf('Path : %s does not exist', $this->path));
        }
    }

    /**
     * Getter path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Setter path
     *
     * @param $path File or folder path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }
}