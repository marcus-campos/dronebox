<?php

namespace DroneBox\Http\Controllers;

use DroneBox\Models\Profile;
use DroneBox\Services\ProfileService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * @var ProfileService
     */
    private $profileService;

    /**
     * ProfileController constructor.
     * @param ProfileService $profileService
     */
    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    /**
     * @SWG\Get(
     *   path="/profile/slug/{slug}",
     *   summary="Retorna os dados do perfil",
     *   operationId="userInfo",
     *   produces={"application/json"},
     *   tags={"Profile"},
     *   @SWG\Parameter(
     *     name="slug",
     *     in="path",
     *     description="Slug do usuário",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Response(response=200, description="Successful operation"),
     *   @SWG\Response(response=406, description="Not acceptable"),
     *   @SWG\Response(response=500, description="Internal server error")
     * )
     * @param $slug
     * @return mixed|static
     */

    public function getProfileBySlug($slug)
    {
        return $this->profileService->getProfileBySlug($slug);
    }

    /**
     * @SWG\Get(
     *   path="/profile/{id}",
     *   summary="Retorna os dados do perfil",
     *   operationId="userInfo",
     *   produces={"application/json"},
     *   tags={"Profile"},
     *   @SWG\Parameter(
     *     name="id",
     *     in="path",
     *     description="Id do usuário",
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

    public function getProfileById($id)
    {
        return $this->profileService->getProfileById($id);
    }

    /**
     * @SWG\Get(
     *   path="/profile/{id}/posts",
     *   summary="Retorna os posts do perfil",
     *   operationId="userInfo",
     *   produces={"application/json"},
     *   tags={"Profile"},
     *   @SWG\Parameter(
     *     name="id",
     *     in="path",
     *     description="Id do usuário",
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
    public function getPosts($id)
    {
       return $this->profileService->getPosts($id);
    }


    public function update($id, $name)
    {

    }
}
