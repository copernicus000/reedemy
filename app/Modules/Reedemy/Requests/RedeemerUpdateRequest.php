<?php

declare(strict_types=1);

namespace App\Modules\Reedemy\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RedeemerUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            'name'=>['required'],
            'slug'=>['required'],
            'filepath'=>['required','file'],
        ];
    }
}
