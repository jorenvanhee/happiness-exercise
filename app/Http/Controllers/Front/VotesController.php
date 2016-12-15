<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Vote;
use App\Models\VoteOption;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VotesController extends Controller
{
    public function create()
    {
        return view('front.votes.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'vote' => Rule::in(VoteOption::values()),
        ]);

        Vote::cast($request->only('vote'));

        return redirect()->route('front.votes.create');
    }
}
