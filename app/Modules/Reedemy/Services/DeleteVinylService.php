<?php

declare(strict_types=1);

namespace App\Modules\Reedemy\Services;

use App\Modules\Reedemy\Models\Redeemer;

class DeleteVinylService
{
    public function destroy($id): void
    {
        Redeemer::destroy($id);
    }
}
