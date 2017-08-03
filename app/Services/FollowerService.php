<?php
/**
 * Created by Marcus Vinícius Campos.
 * Date: 03/08/17
 * Time: 08:15
 */

namespace DroneBox\Services;


use DroneBox\Models\Follower;
use Illuminate\Http\Request;

class FollowerService
{

    //Quem me segue
    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function followers($id)
    {
        return Follower::where('receiver_id', $id)->get();
    }

    //Quem eu sigo
    /**
     * @param $id
     * @return $this
     */
    public function following($id)
    {
        return Follower::where('requester_id', $id)->get();
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public function store(Request $request)
    {
        $follower = Follower::withTrashed()->firstOrCreate($request->all());
        if($follower->restore())
            return $follower;
        else
            return response()->json([
                'message' => 'Can\'t store this follower'
            ], 400);
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|\Illuminate\Http\JsonResponse|null|static|static[]
     */
    public function delete($id)
    {
        if(Follower::destroy($id))
            return Follower::withTrashed()->find($id);
        else
            return response()->json([
                'message' => 'Can\'t delete this follower'
            ], 400);
    }
}