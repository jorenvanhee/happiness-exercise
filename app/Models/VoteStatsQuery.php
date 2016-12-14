<?php

namespace App\Models;

use App\Models\VoteStats;

class VoteStatsQuery
{
    public static function get(callable $callback = null)
    {
        $query = $callback === null
            ? Vote::query()
            : call_user_func($callback, Vote::query());

        $queryForTotalCount = clone $query;

        $voteStatsCollection = new VoteStatsCollection();

        /**
         * Sqlite needs the "* 1.0". In Sqlite the division of an integer
         * by another integer will always round down to the closest
         * integer. We could also use cast(... as float) but mysql does
         * not support that.
         */
        $query
            ->selectRaw(
                'vote, count(*) as count, count(*) * 1.0 / ? * 100 as percentage',
                [$queryForTotalCount->count()]
            )
            ->groupBy('vote')
            ->get()
            ->each(function ($vote) use ($voteStatsCollection) {
                $voteStatsCollection->put(
                    (string) $vote->vote,
                    new VoteStats($vote->count, $vote->percentage)
                );
            });

        return $voteStatsCollection;
    }
}