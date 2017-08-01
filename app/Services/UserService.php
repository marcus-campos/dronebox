<?php
/**
 * Created by Marcus.
 * Date: 01/08/17
 * Time: 16:57
 */

namespace DroneBox\Services;


use DroneBox\Models\User;
use Illuminate\Http\Request;

class UserService
{
    /**
     * @var ProfileService
     */
    private $profileService;

    /**
     * UserService constructor.
     * @param ProfileService $profileService
     */
    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    public function create(Request $request)
    {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        $profile = $this->profileService->store($user->id, $request['name']);

        return response()->json([
            'id' => $user->id,
            'profile_slug' => $profile->slug
        ], 200);
    }
}