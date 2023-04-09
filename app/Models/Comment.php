<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id', 'name', 'email', 'phone', 'comment', 'commentable_id', 'commentable_type'
    ];

    protected $with = [
        'childSubComments'
    ];

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function childSubComments()
    {
        return $this->children()->with('childSubCategories');
    }

    public function commentable()
    {
        return $this->morphTo();
    }
}
