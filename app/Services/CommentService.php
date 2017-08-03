<?php
/**
 * Created by Marcus Vinícius Campos.
 * Date: 03/08/17
 * Time: 16:24
 */

namespace DroneBox\Services;


use DroneBox\Models\Comment;
use Illuminate\Http\Request;

class CommentService
{
    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|static|static[]
     */
    public function comment($id)
    {
        return Comment::find($id);
    }

    /**
     * @param $id
     * @return $this
     */
    public function comments($id)
    {
        return Comment::where('post_id', $id)->with('post')->get();
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public function store(Request $request)
    {
        return Comment::create($request->all());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|\Illuminate\Http\JsonResponse|null|static|static[]
     */
    public function update(Request $request)
    {
        if(Comment::find($request['id'])->update($request->all()))
            return Comment::find($request['id']);
        else
            return response()->json([
                'message' => 'Can\'t update this comment'
            ], 400);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        if(Comment::destroy($id))
            return Comment::withTrashed()->find($id);
        else
            return response()->json([
                'message' => 'Can\'t delete this comment'
            ], 400);
    }
}