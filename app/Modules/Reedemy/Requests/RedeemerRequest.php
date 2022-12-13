<?php

declare(strict_types=1);

namespace App\Modules\Reedemy\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RedeemerRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public static function rules(): array
    {
        return [
            'name'=>['required'],
            'slug'=>['required'],
            'userid'=>['required'],
            'filepath'=>['required','file'],

        ];
    }
}
