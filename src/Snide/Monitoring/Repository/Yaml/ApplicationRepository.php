<?php

namespace Snide\Monitoring\Repository\Yaml;

use Snide\Monitoring\Model\Application;
use Snide\Monitoring\Repository\ApplicationRepositoryInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Yaml\Yaml;

/**
 * Class ApplicationRepository
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class ApplicationRepository implements ApplicationRepositoryInterface
{
    /**
     * Save filename
     *
     * @var string
     */
    protected $filename;
    /**
     * Application class
     *
     * @var string
     */
    protected $class;

    /**
     * Constructor
     *
     * @param string $class Application class
     * @param string $filename save file
     */
    public function __construct($class, $filename)
    {
        $this->class = $class;
        $this->filename = $filename;

        $fs = new Filesystem();
        $fs->touch($this->filename);
    }

    /**
     * Retrieve all applications
     *
     * @return array
     */
    public function findAll()
    {
        $applications = array();

        foreach ($this->getRows() as $row) {
            $application = $this->createNew();
            $application->setId($row['id']);
            $application->setName($row['name']);
            $application->setUrl($row['url']);

            $applications[] = $application;
        }

        return $applications;
    }

    /**
     * Find application by ID
     *
     * @param $id App ID
     * @return Application|null
     */
    public function find($id)
    {
        foreach ($this->findAll() as $application) {
            if ($id == $application->getId()) {
                return $application;
            }
        }

        return null;
    }

    /**
     * Create an application
     *
     * @param Application $application
     * @return mixed
     */
    public function create(Application $application)
    {
        $rows = $this->getRows();
        $id = sizeof($rows) + 1;

        $rows[] = array(
            'id' => $id,
            'name' => $application->getName(),
            'url' => $application->getUrl()
        );

        file_put_contents($this->filename, Yaml::dump($rows));
    }

    /**
     * Delete an application
     *
     * @param Application $application
     * @return mixed
     */
    public function delete(Application $application)
    {
        $rows = array();

        foreach ($this->getRows() as $row) {
            if ($row['id'] == $application->getId()) {
                continue;
            }
            $rows[] = $row;
        }

        file_put_contents($this->filename, Yaml::dump($rows));
    }

    /**
     * Update an application
     *
     * @param Application $application
     * @return mixex
     */
    public function update(Application $application)
    {
        $rows = array();

        foreach ($this->getRows() as $row) {
            if ($row['id'] == $application->getId()) {
                $row = array(
                    'id'   => $application->getId(),
                    'name' => $application->getName(),
                    'url'  => $application->getUrl()
                );
            }
            $rows[] = $row;
        }

        file_put_contents($this->filename, Yaml::dump($rows));
    }

    /**
     * Get List of applications rows
     * @return array
     */
    private function getRows()
    {
        return Yaml::parse($this->filename) ? : array();
    }

    /**
     * Create new instance
     *
     * @return Application
     */
    public function createNew()
    {
        $class = $this->class;

        return new $class;
    }
}
