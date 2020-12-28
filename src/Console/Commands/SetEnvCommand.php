<?php

namespace Rabol\LaravelSetupLocalDev\Console\Commands;

use Illuminate\Console\Command;
use Jackiedo\DotenvEditor\Exceptions\InvalidValueException;
use Jackiedo\DotenvEditor\Facades\DotenvEditor;

class SetEnvCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setuplocaldev:setenv {--file= : Read env vars from this file.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup default .env variables';

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
        $this->info('Installing default .env vars.');

        if($this->option('file') !== null)
        {
            $default_env_vars_file = $this->option('file');
        }
        else
        {
            $default_env_vars_file = get_home_directory();
            $default_env_vars_file .= '/.default_vars.env';
        }

        if(!file_exists($default_env_vars_file))
        {
            $this->error('File: \'' . $default_env_vars_file . '\' does not exists.');
            exit();
        }

        $this->info('Reading from: ' . $default_env_vars_file);

        $user_vars = DotenvEditor::load($default_env_vars_file);
        try {
            $user_keys = $user_vars->getKeys();
        }
        catch (InvalidValueException $ive)
        {
            $this->error($ive->getMessage());
            $this->error('A value in the ' . $default_env_vars_file . ' contains white spaces but no quotes around.' . "\n" . 'Please add quotes and try again.');
            exit();
        }

        // Load the .env
        $app_env = DotenvEditor::load();

        // Now apply the user vars
        foreach ($user_keys as $user_key => $user_value)
        {
            $newValue = $user_value['value'];

            if($newValue == '[ASK_FOR_VALUE]')
            {
                $newValue = $this->ask("Please ente value for '$user_key'");
            }

            if($app_env->keyExists($user_key))
            {
                $this->info("Update $user_key from " . $app_env->getValue($user_key) . " to $newValue");
            }
            else
            {
                $this->info("Create new key $user_key with value $newValue");
            }

            $app_env->setKey($user_key,$newValue);
        }

        $app_env->save();

        $this->info('Clear config cache');
        $this->call('config:clear');
        $this->info('Done!');
    }
}
