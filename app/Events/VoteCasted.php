<?php

namespace App\Events;

use App\Models\Vote;
use Illuminate\Queue\SerializesModels;

class VoteCasted
{
    use SerializesModels;

    public $vote;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Vote $vote)
    {
        $this->vote = $vote;
    }
}
