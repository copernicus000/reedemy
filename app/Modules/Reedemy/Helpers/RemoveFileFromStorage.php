<?php

declare(strict_types=1);

namespace App\Modules\Reedemy\Helpers;

use App\Modules\Reedemy\Models\Redeemer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Void_;


class RemoveFileFromStorage
{
    /**
     * @param $id
     * @return RedirectResponse|void
     */
    public function remove($id)
    {
        $redeemer = Redeemer::find($id);
        $path = str_replace('public', '', $redeemer->file_path);
        //dd($path);
        if(Storage::disk('public')->exists($path))
        {
            Storage::disk('public')->delete($path);
        }
        else
        {
            return redirect()->back()->withErrors(['msg'=>'File does not exist!']);
        }
    }
}
