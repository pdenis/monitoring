<?php

namespace Snide\Monitoring\Manager;

use Snide\Monitoring\Loader\TestLoaderInterface;
use Snide\Monitoring\Model\Application;
use Snide\Monitoring\Repository\ApplicationRepositoryInterface;

/**
 * Class ApplicationManager
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
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
     * Test loader (Loader for application tests)
     *
     * @var TestLoaderInterface
     */
    protected $testLoader;

    /**
     * Constructor
     *
     * @param ApplicationRepositoryInterface $repository Application repository
     * @param $class
     * @param \Snide\Monitoring\Loader\TestLoaderInterface $testLoader Application test loader
     */
    public function __construct(ApplicationRepositoryInterface $repository, $class, TestLoaderInterface $testLoader)
    {
        $this->repository = $repository;
        $this->class = $class;
        $this->testLoader = $testLoader;
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
     * @param \Snide\Monitoring\Model\Application $application
     */
    public function delete(Application $application)
    {
        $this->repository->delete($application);
    }

    /**
     * Find an application
     *
     * @param string $id App ID
     * @return Application
     */
    public function find($id)
    {
        $application = $this->repository->find($id);
        // Load tests
        $this->testLoader->loadByApplication($application);

        return $application;
    }

    /**
     * Find all applications
     *
     * @return array
     */
    public function findAll()
    {
        $applications = array();
        foreach ($this->repository->findAll() as $application) {
            // Load tests
            $this->testLoader->loadByApplication($application);
            $applications[] = $application;
        }

        return $applications;
    }

    /**
     * Update an application
     *
     * @param \Snide\Monitoring\Model\Application $application
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

    /**
     * Getter testLoader
     *
     * @return \Snide\Monitoring\Loader\TestLoaderInterface
     */
    public function getTestLoader()
    {
        return $this->testLoader;
    }

    /**
     * Getter repository
     *
     * @return ApplicationRepositoryInterface
     */
    public function getRepository()
    {
        return $this->repository;
    }

}
