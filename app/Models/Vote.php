<?php

namespace App\Models;

use App\Events\VoteCasted;
use App\Models\VoteOption;
use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Vote extends Model
{
    protected $fillable = ['vote'];

    public static function cast(array $attributes = [])
    {
        $vote = static::create($attributes);

        event(new VoteCasted($vote));

        return $vote;
    }

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

    public function getVoteAttribute($value)
    {
        return $value instanceof VoteOption
            ? $value
            : new VoteOption($value);
    }

    public function setVoteAttribute($value)
    {
        $this->attributes['vote'] = $value instanceof VoteOption
            ? $value
            : new VoteOption($value);
    }
}
