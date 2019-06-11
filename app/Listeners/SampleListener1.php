<?php

namespace App\Listeners;

use App\Events\SampleEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SampleListener1
{
    private $sampleModel;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct($sampleModel)
    {
        $this->sampleModel = $sampleModel;
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
