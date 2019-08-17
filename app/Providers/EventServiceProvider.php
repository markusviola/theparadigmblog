<?php

namespace TheParadigmArticles\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \TheParadigmArticles\Events\SampleEvent::class => [
            \TheParadigmArticles\Listeners\SampleListener1::class,
            \TheParadigmArticles\Listeners\SampleListener2::class,
            \TheParadigmArticles\Listeners\SampleListener3::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
