<?php

namespace DroneBox\Models;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    protected $fillable = [
        'requester_id',
        'receiver_id'
    ];
}
