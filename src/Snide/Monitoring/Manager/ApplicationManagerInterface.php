<?php

/*
 * This file is part of the Snide monitoring package.
 *
 * (c) Pascal DENIS <pascal.denis.75@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
