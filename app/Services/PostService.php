<?php
/**
 * Created by Marcus.
 * Date: 01/08/17
 * Time: 22:40
 */

namespace DroneBox\Services;


use DroneBox\Models\Post;
use DroneBox\Models\Profile;
use Illuminate\Support\Facades\Auth;

class PostService
{
    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getProfilePosts($id)
    {
        return Post::where('profile_id', $id)->orderBy('created_at','DESC')->get();
    }
}