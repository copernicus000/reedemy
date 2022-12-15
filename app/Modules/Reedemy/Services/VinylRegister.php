<?php

declare(strict_types=1);

namespace App\Modules\Reedemy\Services;

use App\Modules\Reedemy\Data\RedeemerData;
use App\Modules\Reedemy\Models\Redeemer;
use App\Modules\Reedemy\Requests\RedeemerRequest;

class VinylRegister
{

    public function register(RedeemerData $data, RedeemerRequest $request): Redeemer
    {
        return Redeemer::register($data::fromRequest($request), $request);
    }
}
