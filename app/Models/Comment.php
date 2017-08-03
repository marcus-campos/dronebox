<?php

namespace DroneBox\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'content',
        'post_id'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
