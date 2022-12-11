<?php

namespace App\Modules\Reedemy\Data;

use Spatie\LaravelData\Data;

class UserData extends Data
{

    public function __construct(
        public string $name,
        public string $email,
        public string $password
    ){
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
