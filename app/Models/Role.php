<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;

class Role extends Model
{
    protected $fillable = [
        'slug',
        'name',
    ];

    public function permissions() {
        return $this->belongsToMany(Permission::class,'roles_permissions');
    }
}
