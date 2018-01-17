<?php namespace Bantenprov\Project;

use Bantenprov\Project\Http\Controllers\ProjectController;

/**
 * The Project class.
 *
 * @package Bantenprov\Project
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class Project
{
    protected $projectController;    

    public function __construct()
    {
        $this->projectController = new ProjectController;
    }

    public function welcome()
    {
        return 'Welcome to Bantenprov\Project package';
    }

    public function projectIndex()
    {
        return $this->projectController->index();
    }

    
}
