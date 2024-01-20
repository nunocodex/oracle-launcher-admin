<?php

namespace App\Console\Commands\Vision;

use Illuminate\Console\Command;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vision:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install all of the Vision resources';

    public function getDescription(): string
    {
        return __($this->description);
    }

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        if ($this->confirm('test?', true)) {
            $this->comment('ok comment');
            $this->call('migrate');
        }
    }
}
