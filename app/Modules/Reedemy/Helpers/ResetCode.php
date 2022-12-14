<?php

declare(strict_types=1);

namespace App\Modules\Reedemy\Helpers;

use App\Modules\Reedemy\Models\Redeemer;

class ResetCode
{
    public function reset($id): void
    {
        $redeemer = Redeemer::find($id);

        $redeemer->code = null;
        $redeemer->save();

    }
}
