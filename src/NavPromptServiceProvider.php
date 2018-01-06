<?php

namespace TheoryThree\NavPrompt;

use Illuminate\Support\ServiceProvider;

class NavPromptServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
      // Routes Example (assumes you have a routes.php file in current dir)
      // if (!$this->routesAreCached()) {
      //  require __DIR__.'/routes.php'
      // }

      $this->publishes([
        __DIR__.'/../config/navprompt.php' => config_path('navprompt.php'),
        // views example (assumes you have views directory with view files contained)
        // __DIR__.'/views' => base_path('resources/views'),
      ], 'navprompt');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {

      // merge config files
      $this->mergeConfigFrom(__DIR__.'/../config/navprompt.php', 'navprompt');

      // register app
      $this->app->bind('navprompt', function($app) {
        return $this->app->make('TheoryThree\NavPrompt\NavPrompt');
      });

    }
}
