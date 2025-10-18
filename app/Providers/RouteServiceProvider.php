<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public function register()
    {
        // no-op
    }

    public function boot()
    {
        if (file_exists(base_path('routes/web.php'))) {
            $this->loadRoutesFrom(base_path('routes/web.php'));
        }
    }
}
