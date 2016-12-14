<?php

namespace App\Models;

class VoteStatsQuery
{
    public static function get(callable $callback = null)
    {
        $query = $callback === null
            ? Vote::query()
            : call_user_func($callback, Vote::query());
            
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
}