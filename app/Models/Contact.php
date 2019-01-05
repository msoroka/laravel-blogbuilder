<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Contact extends Model
{
    protected $fillable = [
        'name',
        'email',
        'message',
        'replied',
        'author_id',
        'answer',
    ];
    
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
