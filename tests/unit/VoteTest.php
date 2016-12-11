<?php

use App\Models\Vote;
use App\Models\VoteOption;
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

    /** @test **/
    public function get_vote_count_and_percentage()
    {
        factory(Vote::class, 2)->create(['vote' => VoteOption::SAD]);
        factory(Vote::class, 4)->create(['vote' => VoteOption::NEUTRAL]);
        factory(Vote::class, 6)->create(['vote' => VoteOption::HAPPY]);

        $voteCount = Vote::getCountAndPercentage()->keyBy('vote');

        $this->assertEquals($voteCount[VoteOption::SAD]->count, 2);
        $this->assertEquals($voteCount[VoteOption::NEUTRAL]->count, 4);
        $this->assertEquals($voteCount[VoteOption::HAPPY]->count, 6);

        $this->assertEquals($voteCount[VoteOption::SAD]->percentage, 16.666666667, '', 0.01);
        $this->assertEquals($voteCount[VoteOption::NEUTRAL]->percentage, 33.333333333, '', 0.01);
        $this->assertEquals($voteCount[VoteOption::HAPPY]->percentage, 50, '', 0.01);
    }
}
