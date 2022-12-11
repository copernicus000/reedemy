<?php

namespace App\Modules\Reedemy\Services;

use App\Modules\Reedemy\Data\UserData;
use App\Modules\Reedemy\Models\User;

class RegisterUser
{
    public function register(UserData $userData): User
    {
        return User::register($userData);
    }
}
