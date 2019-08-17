<?php

namespace TheParadigmArticles\Listeners;

use TheParadigmArticles\Events\SampleEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SampleListener2
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SampleEvent  $event
     * @return void
     */
    public function handle(SampleEvent $event)
    {
        //
    }
}
