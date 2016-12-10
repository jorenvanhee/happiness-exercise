<?php

namespace App\Models;

use App\Models\VoteOption;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = ['vote'];

    public function getVoteAttribute($value)
    {
        return new VoteOption($value);
    }

    public function setVoteAttribute($value)
    {
        $this->attributes['vote'] = new VoteOption($value);
    }
}
