<?php

namespace App\Listeners;

use App\Events\ConsecutiveNegativeVotesDetected;
use App\Notifications\ConsecutiveNegativeVotes;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
        User::all()->each(function ($user) {
            $user->notify(new ConsecutiveNegativeVotes);
        });
    }
}
