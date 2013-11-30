<?php


namespace Snide\Monitoring\Manager;

use Snide\Monitoring\Model\Application;


/**
 * Interface ApplicationManagerInterface
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
interface ApplicationManagerInterface
{
    /**
     * Create and save an application
     *
     * @param Application $application
     */
    public function create(Application $application);

    /**
     * Delete an application
     *
     * @param Application $application
     */
    public function delete(Application $application);

    /**
     * Update an application
     *
     * @param Application $application
     */
    public function update(Application $application);

    /**
     * Create an application instance
     *
     * @return Application
     */
    public function createNew();

    /**
     * Find an application
     *
     * @param string $id App ID
     * @return Application
     */
    public function find($id);

    /**
     * Find all applications
     *
     * @return array
     */
    public function findAll();
}