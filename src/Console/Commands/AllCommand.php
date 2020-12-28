<?php

namespace Rabol\LaravelSetupLocalDev\Console\Commands;

use Illuminate\Console\Command;

class AllCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setuplocaldev:all { --file_env= : Read env vars from this file.}{ --file_tasks= : Read tasks from this file.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute all \'Setup local dev\' commands';

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
        if($this->option('file_env'))
        {
            $this->call('setuplocaldev:setenv',['--file' => $this->option('file_env')]);
        }
        else
        {
            $this->call( 'setuplocaldev:setenv');
        }

        if($this->option('file_tasks'))
        {
            $this->call( 'setuplocaldev:commontasks',['--file' => $this->option('file_tasks')]);
        }
        else
        {
            $this->call( 'setuplocaldev:commontasks');
        }
    }
}
