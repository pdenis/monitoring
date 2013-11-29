<?php

namespace Snide\Monitoring\Test\File;

use Snide\Monitoring\Model\Test;

/**
 * Class Permission
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class Permission extends Test
{

    /**
     * File of folder path
     *
     * @var string
     */
    protected $path;

    /**
     * List of permissions to test
     *
     * @var array
     */
    protected $permissions;

    /**
     * Constructor
     *
     * @param string $identifier Test identifier
     * @param string $path File or folder path
     * @param array $permissions List of permissions to test
     */
    public function __construct($identifier, $path, array $permissions)
    {
        $this->path = $path;
        $this->permissions = $permissions;
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
        if(file_exists($this->path)) {
            $filePermissions = substr(sprintf('%o', fileperms($this->path)), -3);;
            if(!in_array($filePermissions, $this->permissions)) {
                throw new \Exception(
                    sprintf(
                        'Path : %s does not have required permissions. Permissions : %s',
                        $this->path,
                        $filePermissions
                    )
                );
            }
        }else {
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
     * @param string $path File or folder path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * Getter permissions
     *
     * @return array
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * Setter permissions
     *
     * @param array $permissions List of permissions
     */
    public function setPermissions(array $permissions)
    {
        $this->permissions = $permissions;
    }
}