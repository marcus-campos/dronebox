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
     *   operationId="userInfo",
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
    public function getPost($id)
    {
        return $this->postService->getPost($id);
    }

    /**
     * @SWG\Get(
     *   path="/post/profile/{id}",
     *   summary="Retorna os posts do perfil",
     *   operationId="userInfo",
     *   produces={"application/json"},
     *   tags={"Profile"},
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
    public function getProfilePosts($id)
    {
        return $this->postService->getProfilePosts($id);
    }
}
