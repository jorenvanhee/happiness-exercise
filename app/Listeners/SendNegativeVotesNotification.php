<?php

namespace App\Listeners;

use App\Events\VoteCasted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNegativeVotesNotification
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
     * @param  VoteCasted  $event
     * @return void
     */
    public function handle(VoteCasted $event)
    {
        //
    }
}
