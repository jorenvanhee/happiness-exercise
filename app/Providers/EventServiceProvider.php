<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\VoteCasted' => [
            'App\Listeners\DetectConsecutiveNegativeVotes',
        ],
        'App\Events\ConsecutiveNegativeVotesDetected' => [
            'App\Listeners\SendConsecutiveNegativeVotesNotification',
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
