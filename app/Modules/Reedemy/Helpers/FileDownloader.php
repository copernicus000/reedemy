<?php

declare(strict_types=1);

namespace App\Modules\Reedemy\Helpers;

use App\Modules\Reedemy\Models\Redeemer;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;


class FileDownloader
{
    public function download($id): StreamedResponse
    {
        $redeemer = Redeemer::find($id);

        $path = str_replace('public', '', $redeemer->file_path);

        return Storage::disk('public')->download($path);
    }
}
