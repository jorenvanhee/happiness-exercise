<?php

namespace App\Listeners;

use App\Events\ConsecutiveNegativeVotesDetected;
use App\Events\VoteCasted;
use App\Models\VoteOption;
use Cache;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DetectConsecutiveNegativeVotes
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
        if (! $event->vote->vote->equals(new VoteOption(VoteOption::SAD))) {
            return $this->resetConsecutiveVotesCounter();
        }

        $this->incrementConsecutiveVotesCounter();

        if ($this->hasReachedConsecutiveVotesLimit()) {
            $this->resetConsecutiveVotesCounter();

            event(new ConsecutiveNegativeVotesDetected);
        }
    }

    protected function hasReachedConsecutiveVotesLimit()
    {
        return Cache::get($this->getCounterKey()) == 3;
    }

    protected function resetConsecutiveVotesCounter()
    {
        Cache::forever($this->getCounterKey(), 0);
    }

    protected function incrementConsecutiveVotesCounter()
    {
        Cache::increment($this->getCounterKey());
    }

    protected function getCounterKey()
    {
        return 'ConsecutiveNegativeVotes';
    }
}
