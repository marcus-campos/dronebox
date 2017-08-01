<?php

namespace DroneBox\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'birthday',
        'description',
        'photo',
        'slug',
        'city',
        'region',
        'country',
        'owner_id'
    ];
}
