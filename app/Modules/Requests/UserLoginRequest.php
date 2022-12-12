<?php

declare(strict_types=1);

namespace App\Modules\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    public static function rules(): array
    {
        return [
            'name' => ['required'],
            'email' => ['required','email'],
            'password' => ['required'],

        ];
    }
}
