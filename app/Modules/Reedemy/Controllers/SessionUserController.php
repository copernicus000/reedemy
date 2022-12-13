<?php

declare(strict_types=1);

namespace App\Modules\Reedemy\Controllers;

use App\Modules\Reedemy\Data\UserData;
use App\Modules\Reedemy\Requests\UserLoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use PHPUnit\Exception;

class SessionUserController
{
    public function create(): View
    {
        return view('sessions.create');
    }

    public function store(UserLoginRequest $request, UserData $data): RedirectResponse
    {
        try{
            $data::from($request);
            //dd($data);
            $attributes = [
                'name' => $data->name,
                'email' => $data->email,
                'password' => $data->password
            ];
        }
        catch (Exception $e)
        {
            throw $e;
        }
        if (auth()->attempt($attributes)) {
            session()->regenerate();
            session()->flash('name', $data->name);
            return redirect('/');
        }
        return redirect('/');
    }

    public function destroy(): RedirectResponse
    {
        auth()->logout();
        return redirect('/');
    }
}
