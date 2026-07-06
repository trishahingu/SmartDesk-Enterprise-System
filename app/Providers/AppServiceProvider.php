<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Event;

use App\Events\ProjectCreated;
use App\Events\TaskCreated;
use App\Events\NotificationSent;

use App\Listeners\UpdateProjectStatus;
use App\Listeners\LogTaskCreated;
use App\Listeners\SendNotification;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }

        Event::listen(
            ProjectCreated::class,
            UpdateProjectStatus::class
        );

        Event::listen(
            TaskCreated::class,
            LogTaskCreated::class
        );

        Event::listen(
            NotificationSent::class,
            SendNotification::class
        );
    }
}