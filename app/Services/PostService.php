<?php
/**
 * Created by Marcus.
 * Date: 01/08/17
 * Time: 22:40
 */

namespace DroneBox\Services;


use DroneBox\Models\Post;
use DroneBox\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostService
{
    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function post($id)
    {
        return Post::find($id);
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function profilePosts($id)
    {
        return Post::where('profile_id', $id)->orderBy('created_at','DESC')->get();
    }


    /**
     * @param Request $request
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public function store(Request $request)
    {
        return Post::create($request->all());
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function update(Request $request)
    {
        if(Post::find($request['id'])->update($request->all()))
           return Post::find($request['id']);
        else
            return response()->json([
                'message' => 'Can\'t update this post'
            ], 400);
    }


    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|\Illuminate\Http\JsonResponse|null|static|static[]
     */
    public function delete($id)
    {
        if(Post::destroy($id))
            return Post::withTrashed()->find($id);
        else
            return response()->json([
                'message' => 'Can\'t delete this post'
            ], 400);
    }
}