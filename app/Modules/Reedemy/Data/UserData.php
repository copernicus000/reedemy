<?php

namespace App\Modules\Reedemy\Data;

use App\Modules\Reedemy\Requests\UserLoginRequest;
use Spatie\LaravelData\Data;

class UserData extends Data
{

    public function __construct(
        public string $name,
        public string $email,
        public string $password
    ){
    }

    public static function fromRequest(UserLoginRequest $request): static
    {
        return new self(
          $request->name,
          $request->email,
          $request->password,
        );
    }


}
