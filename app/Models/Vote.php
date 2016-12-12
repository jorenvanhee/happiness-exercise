<?php

namespace App\Models;

use App\Models\VoteOption;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use DateTime;

class Vote extends Model
{
    protected $fillable = ['vote'];

    public function scopeForDay($query)
    {
        $day = Carbon::today();

        $start = $day->copy()->setTime(0, 0, 0);
        $end = $start->copy()->addDay()->subSecond();

        return $query->between($start, $end);
    }

    public function scopeForWeek($query)
    {
        $day = Carbon::today();

        $start = $day->copy()->startOfWeek();
        $end = $day->copy()->endOfWeek();

        return $query->between($start, $end);
    }

    public function scopeForMonth($query)
    {
        $day = Carbon::today();

        $start = $day->copy()->startOfMonth();
        $end = $day->copy()->endOfMonth();

        return $query->between($start, $end);
    }

    public function scopeBetween($query, DateTime $start, DateTime $end)
    {
        return $query->whereBetween('created_at', [$start, $end]);
    }

    public function scopeGetCountAndPercentage($query)
    {
        $queryForTotalCount = clone $query;

        /**
         * Sqlite needs the "* 1.0". In Sqlite the division of an integer
         * by another integer will always round down to the closest
         * integer. We could also use cast(... as float) but mysql does
         * not support that.
         */
        return $query
            ->selectRaw(
                'vote, count(*) as count, count(*) * 1.0 / ? * 100 as percentage',
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
