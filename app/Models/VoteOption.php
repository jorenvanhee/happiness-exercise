<?php

namespace App\Models;

use MyCLabs\Enum\Enum;
use JsonSerializable;

class VoteOption extends Enum implements JsonSerializable
{
    const SAD = 'sad';
    const NEUTRAL = 'neutral';
    const HAPPY = 'happy';

    public function jsonSerialize()
    {
        return $this->value;
    }
}