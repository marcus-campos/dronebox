<?php

/**
 * Created by Marcus Vinícius Campos.
 * Date: 03/08/17
 * Time: 15:46
 */

namespace DroneBox\Services;

use DroneBox\Models\Follower;
use DroneBox\Models\Post;

class TimelineService
{
    public function feed($id)
    {
        $following = Follower::where('requester_id', $id)->pluck('id')->toArray();
        return Post::whereIn('profile_id', $following)->with('profile')->orderByDesc('created_at')->get();
    }
}