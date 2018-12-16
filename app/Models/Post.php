<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Post extends Model
{
    protected $fillable = [
        'author_id',
        'category_id',
        'name',
        'content',
        'status',
    ];

    protected static $postStatuses = [
        'Draft',
        'Pending',
        'Published',
    ];

    public static function postStatuses()
    {
        return static::$postStatuses;
    }

    public function getStatusNameAttribute()
    {
        return Arr::get(static::postStatuses(), $this->status);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
