<?php

namespace DroneBox\Http\Controllers;

use DroneBox\Models\User;
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
     * @SWG\Post(
     *   path="/user/signup",
     *   summary="User registration",
     *   operationId="userRegister",
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
}
