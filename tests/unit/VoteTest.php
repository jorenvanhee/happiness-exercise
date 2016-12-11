<?php

use App\Models\Vote;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class VoteTest extends TestCase
{
    use DatabaseMigrations;

    /** @test **/
    public function get_votes_for_day()
    {
        $voteTodayA = factory(Vote::class)->create(['created_at' => Carbon::today()]);
        $voteTodayB = factory(Vote::class)->create(['created_at' => Carbon::today()->setTime(23, 59, 59)]);
        $voteYesterday = factory(Vote::class)->create(['created_at' => Carbon::yesterday()]);

        $votesForDay = Vote::forDay()->get();

        $this->assertTrue($votesForDay->contains($voteTodayA));
        $this->assertTrue($votesForDay->contains($voteTodayB));
        $this->assertFalse($votesForDay->contains($voteYesterday));
    }
}
