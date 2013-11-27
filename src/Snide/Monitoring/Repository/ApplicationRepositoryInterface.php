<?php


namespace Snide\Monitoring\Repository;

use Snide\Monitoring\Model\Application;


/**
 * Class ApplicationRepositoryInterface
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
interface ApplicationRepositoryInterface
{
    /**
     * Retrieve all applications
     *
     * @return array
     */
    public function findAll();

    /**
     * Find application by ID
     *
     * @param $id App ID
     * @return Application|null
     */
    public function find($id);

    /**
     * Create an application
     *
     * @param Application $application
     * @return mixed
     */
    public function create(Application $application);

    /**
     * Delete an application
     *
     * @param Application $application
     * @return mixed
     */
    public function delete(Application $application);

    /**
     * Update an application
     *
     * @param Application $application
     * @return mixex
     */
    public function update(Application $application);
}