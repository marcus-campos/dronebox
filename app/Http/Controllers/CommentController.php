<?php

namespace DroneBox\Http\Controllers;

use DroneBox\Services\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * @var CommentService
     */
    private $commentService;

    /**
     * CommentController constructor.
     * @param CommentService $commentService
     */
    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    /**
     * @SWG\Get(
     *   path="/comment/{id}",
     *   summary="Retorna os dados do comentario",
     *   operationId="commentInfo",
     *   produces={"application/json"},
     *   tags={"Comment"},
     *   @SWG\Parameter(
     *     name="id",
     *     in="path",
     *     description="Id do comentário",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Response(response=200, description="Successful operation"),
     *   @SWG\Response(response=406, description="Not acceptable"),
     *   @SWG\Response(response=500, description="Internal server error")
     * )
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|static|static[]
     */
    public function comment($id)
    {
        return $this->commentService->comment($id);
    }

    /**
     * @SWG\Get(
     *   path="/comment/post/{id}",
     *   summary="Retorna os comentarios do post",
     *   operationId="commentPostInfo",
     *   produces={"application/json"},
     *   tags={"Comment"},
     *   @SWG\Parameter(
     *     name="id",
     *     in="path",
     *     description="Id do post",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Response(response=200, description="Successful operation"),
     *   @SWG\Response(response=406, description="Not acceptable"),
     *   @SWG\Response(response=500, description="Internal server error")
     * )
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|static|static[]
     */
    public function comments($id)
    {
        return $this->commentService->comments($id);
    }

    /**
     * @SWG\Post(
     *   path="/comment",
     *   summary="Cadastra um comentário",
     *   operationId="comment",
     *   produces={"application/json"},
     *   tags={"Comment"},
     *   @SWG\Parameter(
     *     name="body",
     *     in="body",
     *     required=true,
     *     @SWG\Schema(
     *         @SWG\Property(property="content", type="string",),
     *         @SWG\Property(property="id", type="integer",),
     *     ),
     *   ),
     *   @SWG\Response(response=200, description="Successful operation"),
     *   @SWG\Response(response=406, description="Not acceptable"),
     *   @SWG\Response(response=500, description="Internal server error")
     * )
     */
    public function store(Request $request)
    {
        return $this->commentService->store($request);
    }

    /**
     * @SWG\Put(
     *   path="/comment",
     *   summary="Altera um comentário",
     *   operationId="commentUpdate",
     *   produces={"application/json"},
     *   tags={"Comment"},
     *   @SWG\Parameter(
     *     name="body",
     *     in="body",
     *     required=true,
     *     @SWG\Schema(
     *         @SWG\Property(property="description", type="string",),
     *         @SWG\Property(property="post_id", type="integer",),
     *     ),
     *   ),
     *   @SWG\Response(response=200, description="Successful operation"),
     *   @SWG\Response(response=406, description="Not acceptable"),
     *   @SWG\Response(response=500, description="Internal server error")
     * )
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|\Illuminate\Http\JsonResponse|null|static|static[]
     */
    public function update(Request $request)
    {
        return $this->commentService->update($request);
    }

    /**
     * @SWG\Delete(
     *   path="/comment/{id}",
     *   summary="Apaga um comentario",
     *   operationId="commentDelete",
     *   produces={"application/json"},
     *   tags={"Comment"},
     *   @SWG\Parameter(
     *     name="id",
     *     in="path",
     *     description="Id do comentario",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Response(response=200, description="Successful operation"),
     *   @SWG\Response(response=406, description="Not acceptable"),
     *   @SWG\Response(response=500, description="Internal server error")
     * )
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|static|static[]
     */
    public function delete($id)
    {
        return $this->commentService->delete($id);
    }
}
