<?php

namespace App\Models;

use App\Models\VoteStats;
use Illuminate\Support\Collection;

class VoteStatsCollection extends Collection
{
    public function for($key, $default = null)
    {
        $default = $default === null
            ? new VoteStats(0, 0)
            : $default;

        return $this->get($key, $default);
    }
}