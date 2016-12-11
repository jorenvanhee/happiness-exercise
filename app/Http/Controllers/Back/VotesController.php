<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Vote;
use Illuminate\Http\Request;

class VotesController extends Controller
{
    public function index()
    {
        $votesToday = Vote::forDay()->get();

        return view('back.votes.index');
    }
}
