<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use App\Models\Post;

class Category extends Model
{
    use NodeTrait;

    public $fullName;

    protected $fillable = [
        'name',
        'parent_id',
    ];

    public function getParentsAttribute()
    {
        if($this->parent){
            // $this->getParents($this);
            return $this->getParents($this) . $this->name;
        }

        return $this->name;
    }

    protected function getParents($node){
        if($node->parent) {
            $this->fullName = $this->fullName . $node->parent->name . '->';
            return $this->getParents($node->parent);
        }

        return $this->fullName;
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}