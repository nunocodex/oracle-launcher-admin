<?php

namespace App\Console\Commands\App;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'app:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install all of the application resources';

    public function getDescription(): string
    {
        return __($this->description);
    }

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        if (!$this->input->isInteractive()) {
            $this->info(__('Interactive not available, please connect directly to the machine and run again the command.'));
        } else {
            if ($this->confirm('Are you sure you want to application install?', true)) {
                $this->createEnvIfNotExists();

                $this->changeEnv([
                    'APP_NAME' => $this->ask(__('Application Name'), 'Laravel'),
                    'APP_ENV' => $this->choice(__('Application Environment'), [
                        'local', 'development', 'production'
                    ]),
                    'APP_DEBUG' => $this->choice(__('Application Debug'), [
                        'true', 'false'
                    ]),
                    'APP_URL' => $this->ask(__('Application URL'), 'http://localhost'),
                    'DB_HOST' => $this->ask(__('DB Host'), '127.0.0.1'),
                    'DB_PORT' => $this->ask(__('DB Port'), '3306'),
                    'DB_DATABASE' => $this->ask(__(__('DB Database')), 'launcher'),
                    'DB_USERNAME' => $this->ask(__(__('DB Username')), 'root'),
                    'DB_PASSWORD' => $this->secret(__('DB Password')) ?? '',
                    'DB_VISION_HOST' => $this->ask(__('DB Vision Host'), '127.0.0.1'),
                    'DB_VISION_PORT' => $this->ask(__('DB Vision Port'), '3306'),
                    'DB_VISION_DATABASE' => $this->ask(__(__('DB Vision Database')), 'vision'),
                    'DB_VISION_USERNAME' => $this->ask(__(__('DB Vision Username')), 'root'),
                    'DB_VISION_PASSWORD' => $this->secret(__('DB Vision Password')) ?? ''
                ]);

                $this->call('key:generate');

                $this->call('orchid:install');

                if ($this->confirm('Do you want to create the orchid admin user?', true)) {
                    $this->call('orchid:admin');
                }

                $this->call('view:clear');
                $this->call('config:clear');
                $this->call('cache:clear');
                $this->call('route:clear');

                $this->call('migrate', [
                    '--force' => true
                ]);

                if (!App::environment('production')) {
                    $this->call('ide-helper:models', [
                        '-W' => true
                    ]);
                }

                $this->info('Application installed successfully.');
            }
        }
    }

    protected function createEnvIfNotExists(): void
    {
        if (!file_exists(base_path() . '/.env')) {
            copy(base_path() . '/.env.example', base_path() . '/.env');
        }
    }

    protected function changeEnv(array $data): bool
    {
        if (count($data) > 0) {
            $env = file_get_contents(base_path() . '/.env');

            $env = explode("\n", $env);

            foreach ($data as $key => $value) {
                foreach ($env as $env_key => $env_value) {
                    $entry = explode("=", $env_value, 2);

                    if ($entry[0] == $key) {
                        $env[$env_key] = $key . '="' . $value . '"';
                    } else {
                        $env[$env_key] = $env_value;
                    }
                }
            }

            $env = implode("\n", $env);

            file_put_contents(base_path() . '/.env', $env);

            return true;
        }

        return false;
    }
}
