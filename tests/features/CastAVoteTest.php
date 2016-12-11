<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CastAVoteTest extends TestCase
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

    /** @test */
    public function user_cannot_make_invalid_vote()
    {
        $this->json('POST', route('front.votes.store'), [
            'vote' => 'invalid-vote',
        ]);

        $this->assertResponseStatus(422);
        $this->assertArrayHasKey('vote', $this->decodeResponseJson());
    }
}
