<?php namespace Bantenprov\Project\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The Project facade.
 *
 * @package Bantenprov\Project
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class Project extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'project';
    }
}
