<?php

namespace App\Providers;

use App\Console\Commands\ModelMakeCommand;
use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (Schema::hasTable('settings')) {
            View::share('title', Setting::all()->first()->name ?? 'Blog name');
            View::share('description', Setting::all()->first()->description ?? 'Blog description');
            View::share('facebook', Setting::all()->first()->facebook ?? null);
            View::share('instagram', Setting::all()->first()->instagram ?? null);
            View::share('owner', Setting::all()->first()->owner ?? null);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->extend('command.model.make', function ($command, $app) {
            return new ModelMakeCommand($app['files']);
        });
    }
}
