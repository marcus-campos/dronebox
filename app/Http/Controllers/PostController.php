<?php

namespace DroneBox\Http\Controllers;

use DroneBox\Services\PostService;
use DroneBox\Services\ProfileService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @var PostService
     */
    private $postService;

    /**
     * PostController constructor.
     * @param PostService $postService
     */
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * @SWG\Get(
     *   path="/post/{id}",
     *   summary="Retorna os dados do post escolhido",
     *   operationId="postInfo",
     *   produces={"application/json"},
     *   tags={"Post"},
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
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function post($id)
    {
        return $this->postService->post($id);
    }

    /**
     * @SWG\Get(
     *   path="/post/profile/{id}",
     *   summary="Retorna os posts do perfil",
     *   operationId="postProfileInfo",
     *   produces={"application/json"},
     *   tags={"Post"},
     *   @SWG\Parameter(
     *     name="id",
     *     in="path",
     *     description="Id do perfil",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Response(response=200, description="Successful operation"),
     *   @SWG\Response(response=406, description="Not acceptable"),
     *   @SWG\Response(response=500, description="Internal server error")
     * )
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function profilePosts($id)
    {
        return $this->postService->profilePosts($id);
    }

    /**
     * @SWG\Post(
     *   path="/post",
     *   summary="Cadastra a publicação",
     *   operationId="post",
     *   produces={"application/json"},
     *   tags={"Post"},
     *   @SWG\Parameter(
     *     name="body",
     *     in="body",
     *     required=true,
     *     @SWG\Schema(
     *         @SWG\Property(property="description", type="string",),
     *         @SWG\Property(property="image_path", type="string",),
     *         @SWG\Property(property="profile_id", type="integer",),
     *     ),
     *   ),
     *   @SWG\Response(response=200, description="Successful operation"),
     *   @SWG\Response(response=406, description="Not acceptable"),
     *   @SWG\Response(response=500, description="Internal server error")
     * )
     */
    public function store(Request $request)
    {
        return $this->postService->store($request);
    }

    /**
     * @SWG\Put(
     *   path="/post",
     *   summary="Atualiza a publicação",
     *   operationId="postUpdate",
     *   produces={"application/json"},
     *   tags={"Post"},
     *   @SWG\Parameter(
     *     name="body",
     *     in="body",
     *     required=true,
     *     @SWG\Schema(
     *         @SWG\Property(property="id", type="integer",),
     *         @SWG\Property(property="description", type="string",),
     *         @SWG\Property(property="image_path", type="string",),
     *         @SWG\Property(property="profile_id", type="integer",),
     *         @SWG\Property(property="like", type="integer",),
     *     ),
     *   ),
     *   @SWG\Response(response=200, description="Successful operation"),
     *   @SWG\Response(response=406, description="Not acceptable"),
     *   @SWG\Response(response=500, description="Internal server error")
     * )
     */
    public function update(Request $request)
    {
        return $this->postService->update($request);
    }

    /**
     * @SWG\Delete(
     *   path="/post/{id}",
     *   summary="Delete uma publicação",
     *   operationId="postDelete",
     *   produces={"application/json"},
     *   tags={"Post"},
     *   @SWG\Parameter(
     *     name="body",
     *     in="body",
     *     required=true,
     *     @SWG\Schema(
     *         @SWG\Property(property="id", type="integer",),
     *         @SWG\Property(property="description", type="string",),
     *         @SWG\Property(property="image_path", type="string",),
     *         @SWG\Property(property="profile_id", type="integer",),
     *         @SWG\Property(property="like", type="integer",),
     *     ),
     *   ),
     *   @SWG\Response(response=200, description="Successful operation"),
     *   @SWG\Response(response=406, description="Not acceptable"),
     *   @SWG\Response(response=500, description="Internal server error")
     * )
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        return $this->postService->delete($id);
    }
}
