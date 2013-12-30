<?php

/*
 * This file is part of the Snide monitoring package.
 *
 * (c) Pascal DENIS <pascal.denis.75@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Snide\Monitoring\Repository;

use Snide\Monitoring\Model\Application;

/**
 * Class ApplicationRepositoryInterface
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
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
