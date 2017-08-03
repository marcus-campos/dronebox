<?php

namespace DroneBox\Http\Controllers;

use DroneBox\Services\FollowerService;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    /**
     * @var FollowerService
     */
    private $followerService;

    /**
     * FollowerController constructor.
     * @param FollowerService $followerService
     */
    public function __construct(FollowerService $followerService)
    {
        $this->followerService = $followerService;
    }

    /**
     * @SWG\Get(
     *   path="/follow/profile/{id}/followers",
     *   summary="Retorna os seguidores do perfil",
     *   operationId="followProfileFollowers",
     *   produces={"application/json"},
     *   tags={"Follow"},
     *   @SWG\Parameter(
     *     name="id",
     *     in="path",
     *     description="Id do profile",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Response(response=200, description="Successful operation"),
     *   @SWG\Response(response=406, description="Not acceptable"),
     *   @SWG\Response(response=500, description="Internal server error")
     * )
     * @param $id
     * @return bool
     * @internal param Request $request
     * @internal param $id
     */

    public function followers($id)
    {
        return $this->followerService->followers($id);
    }

    /**
     * @SWG\Get(
     *   path="/follow/profile/{id}/following",
     *   summary="Retorna quem o perfil segue",
     *   operationId="followProfileFollowing",
     *   produces={"application/json"},
     *   tags={"Follow"},
     *   @SWG\Parameter(
     *     name="id",
     *     in="path",
     *     description="Id do profile",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Response(response=200, description="Successful operation"),
     *   @SWG\Response(response=406, description="Not acceptable"),
     *   @SWG\Response(response=500, description="Internal server error")
     * )
     * @param $id
     * @return bool
     * @internal param Request $request
     * @internal param $id
     */

    public function following($id)
    {
        return $this->followerService->following($id);
    }

    /**
     * @SWG\Post(
     *   path="/follow",
     *   summary="Permite seguir ou ser seguido por uma ou várias pessoas",
     *   operationId="follow",
     *   produces={"application/json"},
     *   tags={"Follow"},
     *   @SWG\Parameter(
     *     name="body",
     *     in="body",
     *     required=true,
     *     @SWG\Schema(
     *         @SWG\Property(property="requester_id", type="integer",),
     *         @SWG\Property(property="receiver_id", type="integer",),
     *     ),
     *   ),
     *   @SWG\Response(response=200, description="Successful operation"),
     *   @SWG\Response(response=406, description="Not acceptable"),
     *   @SWG\Response(response=500, description="Internal server error")
     * )
     * @param Request $request
     * @return bool
     * @internal param $id
     */

    public function store(Request $request)
    {
        return $this->followerService->store($request);
    }

    /**
     * @SWG\Delete(
     *   path="/follow/{id}",
     *   summary="Permite deletar um relacionamento",
     *   operationId="followDelete",
     *   produces={"application/json"},
     *   tags={"Follow"},
     *   @SWG\Parameter(
     *     name="body",
     *     in="body",
     *     required=true,
     *     @SWG\Schema(
     *         @SWG\Property(property="requester_id", type="integer",),
     *         @SWG\Property(property="receiver_id", type="integer",),
     *     ),
     *   ),
     *   @SWG\Response(response=200, description="Successful operation"),
     *   @SWG\Response(response=406, description="Not acceptable"),
     *   @SWG\Response(response=500, description="Internal server error")
     * )
     * @param $id
     * @return bool
     * @internal param $id
     */

    public function delete($id)
    {
        return $this->followerService->delete($id);
    }
}
