<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Vote;
use Illuminate\Http\Request;

class VotesController extends Controller
{
    public function index()
    {
        $votesToday = Vote::forDay()->getCountAndPercentage()->keyBy('vote');
        $votesWeek = Vote::forWeek()->getCountAndPercentage()->keyBy('vote');
        $votesMonth = Vote::forMonth()->getCountAndPercentage()->keyBy('vote');

        return view('back.votes.index', compact('votesToday', 'votesWeek', 'votesMonth'));
    }
}
