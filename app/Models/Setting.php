<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'name',
        'description',
        'facebook',
        'instagram',
        'owner_id',
        'theme',
        'about',
        'font',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
