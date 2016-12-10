<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VoteTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function user_can_vote()
    {
        $this->visit(route('front.votes.create'))
             ->press('happy');

        $this->seeInDatabase('votes', [
            'vote' => 'happy',
        ]);

        $this->seePageIs(route('front.votes.create'));
    }
}
