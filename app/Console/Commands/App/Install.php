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
        if ($this->confirm('Are you sure you want to application install?', true)) {
            $this->createEnvIfNotExists();

            $install = $this->changeEnv([
                'APP_NAME' => $this->ask(__('Application Name'), config('app.name')),
                'APP_ENV' => $this->choice(__('Application Environment'), [
                    'local', 'development', 'production'
                ], config('app.env')),
                'APP_DEBUG' => $this->choice(__('Application Debug'), [
                    'true', 'false'
                ], config('app.debug')),
                'APP_URL' => $this->ask(__('Application URL'), config('app.url')),
                'DB_HOST' => $this->ask(__('DB Host'), config('database.connections.mysql.host')),
                'DB_PORT' => $this->ask(__('DB Port'), config('database.connections.mysql.port')),
                'DB_DATABASE' => $this->ask(__(__('DB Database')), config('database.connections.mysql.database')),
                'DB_USERNAME' => $this->ask(__(__('DB Username')), config('database.connections.mysql.username')),
                'DB_PASSWORD' => $this->secret(__('DB Password')) ?? config('database.connections.mysql.password'),
                'DB_VISION_HOST' => $this->ask(__('DB Vision Host'), config('database.connections.vision.host')),
                'DB_VISION_PORT' => $this->ask(__('DB Vision Port'), config('database.connections.vision.port')),
                'DB_VISION_DATABASE' => $this->ask(__(__('DB Vision Database')), config('database.connections.vision.database')),
                'DB_VISION_USERNAME' => $this->ask(__(__('DB Vision Username')), config('database.connections.vision.username')),
                'DB_VISION_PASSWORD' => $this->secret(__('DB Vision Password')) ?? config('database.connections.vision.password')
            ]);

            if ($install) {
                $this->call('key:generate', [
                    '--ansi' => true
                ]);

                $this->call('migrate', [
                    '--force' => true
                ]);

                $this->call('storage:link');
                $this->call('orchid:publish');

                if ($this->confirm('Do you want to create the orchid admin user?', true)) {
                    $this->call('orchid:admin');
                }

                $this->call('view:clear');
                $this->call('config:clear');
                $this->call('cache:clear');
                $this->call('route:clear');

                if (!App::environment('production')) {
                    $this->call('ide-helper:models', [
                        '-W' => true
                    ]);
                }

                $this->info('Application installed successfully.');
            } else {
                $this->call('app:install');
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
