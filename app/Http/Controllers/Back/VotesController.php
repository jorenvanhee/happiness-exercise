<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Vote;
use App\Models\VoteStatsQuery;
use Illuminate\Http\Request;

class VotesController extends Controller
{
    public function index()
    {
        $voteStatsDay = VoteStatsQuery::get(function ($query) {
            return $query->forDay();
        });
        $voteStatsWeek = VoteStatsQuery::get(function ($query) {
            return $query->forWeek();
        });
        $voteStatsMonth = VoteStatsQuery::get(function ($query) {
            return $query->forMonth();
        });

        return view('back.votes.index', compact('voteStatsDay', 'voteStatsWeek', 'voteStatsMonth'));
    }
}
