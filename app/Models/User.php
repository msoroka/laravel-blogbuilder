<?php

namespace App\Models;

use App\Models\Blog;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Permissions\HasPermissionsTrait;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasPermissionsTrait;

    protected $fillable = [
        'first_name',
        'last_name',
        'nickname',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
