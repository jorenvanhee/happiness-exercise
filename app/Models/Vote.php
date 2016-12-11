<?php

namespace App\Models;

use App\Models\VoteOption;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Vote extends Model
{
    protected $fillable = ['vote'];

    public function scopeForDay($query)
    {
        $day = Carbon::today();

        $start = $day->copy()->setTime(0, 0, 0);
        $end = $start->copy()->addDay()->subSecond();

        return $query->where([
            ['created_at', '>=', $start],
            ['created_at', '<=', $end],
        ]);
    }

    public function scopeGetCountAndPercentage($query)
    {
        $queryForTotalCount = clone $query;

        return $query
            ->selectRaw(
                'vote, count(*) as count, cast(count(*) as float) / ? * 100 as percentage',
                [$queryForTotalCount->count()]
            )
            ->groupBy('vote')
            ->get();
    }

    public function getVoteAttribute($value)
    {
        return new VoteOption($value);
    }

    public function setVoteAttribute($value)
    {
        $this->attributes['vote'] = $value instanceof VoteOption
            ? $value
            : new VoteOption($value);
    }
}
