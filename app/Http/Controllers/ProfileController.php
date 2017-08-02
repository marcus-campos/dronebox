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
     *   path="/profile/{id}",
     *   summary="Retorna os dados do perfil",
     *   operationId="userInfo",
     *   produces={"application/json"},
     *   tags={"User"},
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
     */

    public function getProfile($id)
    {
        return $this->profileService->getProfile($id);
    }

    public function update($id, $name)
    {

    }
}
