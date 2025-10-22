<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class EnsureDatabase extends Command
{
    protected $signature = 'ensure:db {--migrate}';

    protected $description = 'Ensure sqlite database file exists and optionally run migrations.';

    public function handle()
    {
        $dbPath = database_path('database.sqlite');

        if (!file_exists($dbPath)) {
            if (!is_dir(dirname($dbPath))) {
                mkdir(dirname($dbPath), 0755, true);
            }
            touch($dbPath);
            $this->info("Created {$dbPath}");
        } else {
            $this->info("Database file exists: {$dbPath}");
        }

        if (!extension_loaded('pdo_sqlite')) {
            $this->error('PDO SQLite extension is not enabled in PHP. Please enable pdo_sqlite in php.ini.');
            return 1;
        }

        $this->info('PDO SQLite is available.');

        if ($this->option('migrate')) {
            $this->info('Running migrations...');
            Artisan::call('migrate', ['--force' => true]);
            $this->info(Artisan::output());
        }

        return 0;
    }
}
