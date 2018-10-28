<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'name',
        'description',
        'slug',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('role_id');
    }
}
