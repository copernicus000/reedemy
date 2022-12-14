<?php

namespace App\Modules\Reedemy\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Modules\Reedemy\Data\UserData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public static function register(UserData $data): User
    {
        $user = new User();

        $user->name = $data->name;
        $user->email = $data->email;
        $user->password = $data->password;

        $user->save();

        return $user;
    }

    public function redeemer(): HasMany
    {
        return $this->hasMany(Redeemer::class,'user_id');
    }

}
