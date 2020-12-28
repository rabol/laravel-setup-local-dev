<?php

namespace Rabol\LaravelSetupLocalDev\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Exception\RuntimeException;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\VarDumper\VarDumper;

class CommonTasksCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setuplocaldev:commontasks {--file= : Read tasks from a file.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute common setup tasks';

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

        $this->info('Executing common taskss.');

        if($this->option('file') !== null)
        {
            $commonTasksFile = $this->option('file');
        }
        else
        {
            $commonTasksFile = get_home_directory();
            $commonTasksFile .= '/.default_laravel_local_dev.tasks';
        }

        if(!file_exists($commonTasksFile))
        {
            $this->error('File: \'' . $commonTasksFile . '\' does not exists.');
            exit();
        }

        // .default_laravel_local_dev.tasks
        $file = fopen($commonTasksFile, "r") or exit("Unable to open file!");
        while(!feof($file))
        {
            $task = trim(fgets($file));
            if(!strlen($task))
                continue;

            $this->info($task);

            // Split the task into an array:
            $taskArray = explode(' ', $task);
            try {
                $process = new Process($taskArray);
                $process->setTimeout(3600);
                $process->run();

                // executes after the command finishes
                if (!$process->isSuccessful()) {
                    //throw new ProcessFailedException($process);
                    $error = sprintf('The command "%s" failed.'."\n\nExit Code: %s(%s)\n\nWorking directory: %s",
                        $process->getCommandLine(),
                        $process->getExitCode(),
                        $process->getExitCodeText(),
                        $process->getWorkingDirectory()
                    );
                    $this->error($error);
                }
                else
                {
                    $this->info($process->getOutput());
                }
            }
            catch (\Exception $e)
            {
                $this->error("Could not execute command: $task");
                $this->error($e->getMessage());
            }
        }

        fclose($file);
    }
}
