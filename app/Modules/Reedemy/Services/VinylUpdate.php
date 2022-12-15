<?php

declare(strict_types=1);

namespace App\Modules\Reedemy\Services;

use App\Modules\Reedemy\Models\Redeemer;
use App\Modules\Reedemy\Requests\RedeemerUpdateRequest;

class VinylUpdate
{
    public function update($id, RedeemerUpdateRequest $request): Redeemer
    {
        $redeemer = Redeemer::find($id);



        $redeemer->name = $request->name;
        $redeemer->slug = $request->slug;
        $redeemer->file_path = $request->file('filepath')->store('public');
        //dd($redeemer->file_path);


        $redeemer->save();

        return $redeemer;

    }
}
