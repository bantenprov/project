<?php namespace Bantenprov\Project\Console\Commands;

use Illuminate\Console\Command;

/**
 * The ProjectCommand class.
 *
 * @package Bantenprov\Project
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class ProjectCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bantenprov:project';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Demo command for Bantenprov\Project package';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Welcome to command for Bantenprov\Project package');
    }
}
