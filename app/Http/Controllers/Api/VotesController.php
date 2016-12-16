<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vote;
use App\Models\VoteOption;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class VotesController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'vote' => ['required', Rule::in(VoteOption::values())],
        ]);

        $vote = Vote::cast($request->only('vote'));

        return response($vote, Response::HTTP_CREATED);
    }
}
