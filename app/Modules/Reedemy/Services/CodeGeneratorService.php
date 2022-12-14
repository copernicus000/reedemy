<?php

declare(strict_types=1);

namespace App\Modules\Reedemy\Services;

use App\Modules\Reedemy\Helpers\GenerateCode;
use App\Modules\Reedemy\Models\Redeemer;

class CodeGeneratorService
{
    public function __construct(
        public GenerateCode $code,
    ){

    }
    public function generate($id): void
    {
        $redeemer = Redeemer::where('slug', $id)->first();

        $redeemer->code = $this->code->generate();
        $redeemer->save();
    }
}
