<?php

namespace App\Models;

use MyCLabs\Enum\Enum;

class VoteOption extends Enum
{
    const SAD = 'sad';
    const NEUTRAL = 'neutral';
    const HAPPY = 'happy';
}