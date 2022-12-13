<?php

declare(strict_types=1);

namespace App\Modules\Reedemy\Helpers;

use App\Modules\Reedemy\Models\Redeemer;
use App\Modules\Reedemy\Requests\RedeemCodeRequest;

class VerifyCode
{
    public function isVerified($id, RedeemCodeRequest $request): bool
    {
        $redeemer = Redeemer::find($id);

        if($request->code == $redeemer->code)
        {
            return true;
        }

        return false;

    }
}
