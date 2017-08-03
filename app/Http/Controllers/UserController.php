<?php

namespace DroneBox\Http\Controllers;

use DroneBox\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * UserController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    /**
     * @SWG\Get(
     *   path="/user/{id}",
     *   summary="Retorna os dados do usuário",
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

    public function user($id)
    {
        return $this->userService->user($id);
    }

    /**
     * @SWG\Post(
     *   path="/user/signup",
     *   summary="Registro de usuários",
     *   operationId="userSignUp",
     *   produces={"application/json"},
     *   tags={"User"},
     *   @SWG\Parameter(
     *     name="body",
     *     in="body",
     *     required=true,
     *     @SWG\Schema(
     *         @SWG\Property(property="name", type="string",),
     *         @SWG\Property(property="email", type="string",),
     *         @SWG\Property(property="password", type="string",),
     *     ),
     *   ),
     *   @SWG\Response(response=200, description="Successful operation"),
     *   @SWG\Response(response=406, description="Not acceptable"),
     *   @SWG\Response(response=500, description="Internal server error")
     * )
     */
    public function signUp(Request $request)
    {
        return $this->userService->create($request);
    }

    public function signIn(Request $request)
    {
        //return $this->userService->create($request);
    }
}
