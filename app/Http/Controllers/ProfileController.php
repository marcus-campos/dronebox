<?php

namespace DroneBox\Http\Controllers;

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
     *   path="/profile/search/{search}",
     *   summary="Retorna os dados do perfil",
     *   operationId="profileSearch",
     *   produces={"application/json"},
     *   tags={"Profile"},
     *   @SWG\Parameter(
     *     name="search",
     *     in="path",
     *     description="A pesquisa pode ser feita por nome ou slug",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Response(response=200, description="Successful operation"),
     *   @SWG\Response(response=406, description="Not acceptable"),
     *   @SWG\Response(response=500, description="Internal server error")
     * )
     * @param $search
     * @return mixed|static
     * @internal param $slug
     */
    public function search($search)
    {
        return $this->profileService->search($search);
    }

    /**
     * @SWG\Get(
     *   path="/profile/slug/{slug}",
     *   summary="Retorna os dados do perfil",
     *   operationId="profileSlugInfo",
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
    public function profileBySlug($slug)
    {
        return $this->profileService->profileBySlug($slug);
    }

    /**
     * @SWG\Get(
     *   path="/profile/{id}",
     *   summary="Retorna os dados do perfil",
     *   operationId="profileInfo",
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
    public function profileById($id)
    {
        return $this->profileService->profileById($id);
    }

    /**
     * @SWG\Put(
     *   path="/profile",
     *   summary="Cadastra a publicação",
     *   operationId="profileUpdate",
     *   produces={"application/json"},
     *   tags={"Profile"},
     *   @SWG\Parameter(
     *     name="body",
     *     in="body",
     *     required=true,
     *     @SWG\Schema(
     *         @SWG\Property(property="id", type="integer",),
     *         @SWG\Property(property="name", type="string",),
     *         @SWG\Property(property="birthday", type="string",),
     *         @SWG\Property(property="description", type="string",),
     *         @SWG\Property(property="photo", type="string",),
     *         @SWG\Property(property="slug", type="string",),
     *         @SWG\Property(property="city", type="string",),
     *         @SWG\Property(property="region", type="string",),
     *         @SWG\Property(property="country", type="string",),
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
       return $this->profileService->update($request);
    }
}
