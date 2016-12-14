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
        $votesToday = VoteStatsQuery::get(function ($query) {
            return $query->forDay();
        })->keyBy('vote');

        $votesWeek = VoteStatsQuery::get(function ($query) {
            return $query->forWeek();
        })->keyBy('vote');

        $votesMonth = VoteStatsQuery::get(function ($query) {
            return $query->forMonth();
        })->keyBy('vote');

        return view('back.votes.index', compact('votesToday', 'votesWeek', 'votesMonth'));
    }
}
