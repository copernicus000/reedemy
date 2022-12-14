<?php

namespace App\Modules\Reedemy\Models;

use App\Modules\Reedemy\Data\RedeemerData;
use App\Modules\Reedemy\Requests\RedeemerRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Redeemer extends Model
{
    use HasFactory;

    public static function register(RedeemerData $data, RedeemerRequest $request): Redeemer
    {
        $redeemer = new Redeemer();

        $redeemer->name = $data->name;
        $redeemer->slug = $data->slug;
        $redeemer->user_id = $data->userid;
        $redeemer->file_path = $request->file('filepath')->store('public');
        $redeemer->code = null;

        $redeemer->save();

        return $redeemer;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
