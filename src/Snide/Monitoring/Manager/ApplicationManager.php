<?php

namespace Snide\Monitoring\Manager;

use Snide\Monitoring\Model\Application;
use Snide\Monitoring\Repository\ApplicationRepositoryInterface;

/**
 * Class ApplicationManager
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
class ApplicationManager implements ApplicationManagerInterface
{
    /**
     * Application repository
     *
     * @var ApplicationRepositoryInterface
     */
    protected $repository;
    /**
     * Application class
     *
     * @var string
     */
    protected $class;

    /**
     * Constructor
     *
     * @param ApplicationRepositoryInterface $repository Application repository
     * @param $class
     */
    public function __construct(ApplicationRepositoryInterface $repository, $class)
    {
        $this->repository = $repository;
        $this->class = $class;
    }

    /**
     * Create and save an application
     *
     * @param Application $application
     */
    public function create(Application $application)
    {
        $this->repository->create($application);
    }

    /**
     * Delete an application
     *
     * @param Application $application
     */
    public function delete(Application $application)
    {
        $this->repository->delete($application);
    }

    /**
     * Find an application
     *
     * @param $id App ID
     * @return Application
     */
    public function find($id)
    {
        return $this->repository->find($id);
    }

    /**
     * Find all applications
     *
     * @return array
     */
    public function findAll()
    {
        return $this->repository->findAll();
    }

    /**
     * Update an application
     *
     * @param Application $application
     */
    public function update(Application $application)
    {
        $this->repository->update($application);
    }

    /**
     * Create an application instance
     *
     * @return Application
     */
    public function createNew()
    {
        $class = $this->class;

        return new $class;
    }
}