<?php

namespace DroneBox\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'description',
        'image_path',
        'like',
        'profile_id'
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
