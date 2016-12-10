<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Vote;
use Illuminate\Http\Request;

class VotesController extends Controller
{
    public function create()
    {
        return view('front.votes.create');
    }

    public function store(Request $request)
    {
        Vote::create($request->only('vote'));

        return redirect()->route('front.votes.create');
    }
}
