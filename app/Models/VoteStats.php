<?php

namespace App\Models;

class VoteStats
{
    protected $count;

    protected $percentage;

    public function __construct(int $count, float $percentage)
    {
        $this->count = $count;
        $this->percentage = $percentage;
    }

    public function count()
    {
        return $this->count;
    }

    public function percentage()
    {
        return round($this->percentage, 2) . '%';
    }
}