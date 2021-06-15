<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class WPJobManagerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('jobmanager', WPJobManager::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if( defined('JOB_MANAGER_VERSION') ) {
            $this->bindFilters();
        }
    }

    public function bindFilters()
    {
        $wpJobManager = $this->app['jobmanager'];

       //add_filter('template_include', [$wpJobManager, 'templateInclude'], 11);
        add_filter('job_manager_locate_template', [$wpJobManager, 'template'], 10, 1);
    }
}
