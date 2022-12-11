<?php

namespace App\Modules\Reedemy\Controllers;

use App\Modules\Reedemy\Data\UserData;
use App\Modules\Reedemy\Services\RegisterUser;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RegisterUserController
{
    public function __construct(
     public RegisterUser $registerUser,
    ){

    }

    public function create(): View
    {
        return view('users.create');
    }

    public function store(UserData $data): RedirectResponse
    {
        $user = $this->registerUser->register($data);

        auth()->login($user);
        session()->regenerate();

        return redirect('/');

    }

}
