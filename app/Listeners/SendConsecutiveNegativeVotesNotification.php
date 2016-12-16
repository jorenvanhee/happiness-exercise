<?php

namespace App\Listeners;

use App\Events\ConsecutiveNegativeVotesDetected;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendConsecutiveNegativeVotesNotification
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
     * @param  ConsecutiveNegativeVotesDetected  $event
     * @return void
     */
    public function handle(ConsecutiveNegativeVotesDetected $event)
    {
        // Do stuff
    }
}
