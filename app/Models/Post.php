<?php

namespace DroneBox\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

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
