<?php

declare(strict_types=1);

namespace App\Modules\Reedemy\Services;

use App\Modules\Reedemy\Models\Redeemer;
use App\Modules\Reedemy\Requests\RedeemerUpdateRequest;

class VinylUpdate
{
    public function update($id, RedeemerUpdateRequest $request): void
    {
        $redeemer = Redeemer::find($id);

        $redeemer->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'file_path' => $request->filepath,
        ]);
        //$redeemer->save();
    }
}
