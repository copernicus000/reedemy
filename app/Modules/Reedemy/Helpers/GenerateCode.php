<?php

declare(strict_types=1);

namespace App\Modules\Reedemy\Helpers;

use Illuminate\Support\Str;

class GenerateCode
{
    public function generate(): string
    {
        return Str::random(6);
    }
}
