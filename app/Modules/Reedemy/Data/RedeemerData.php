<?php

declare(strict_types=1);

namespace App\Modules\Reedemy\Data;

use App\Modules\Reedemy\Requests\RedeemerRequest;
use Spatie\LaravelData\Data;

class RedeemerData extends Data
{
    public function __construct(
        public string $name,
        public string $slug,
        public string $userid,
    ){

    }

    public static function fromRequest(RedeemerRequest $request): static
    {
        return new self(
            $request->name,
            $request->slug,
            $request->userid,
        );
    }
}
