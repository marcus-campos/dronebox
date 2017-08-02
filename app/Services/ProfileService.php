<?php
/**
 * Created by Marcus.
 * Date: 01/08/17
 * Time: 16:54
 */

namespace DroneBox\Services;


use DroneBox\Models\Profile;

class ProfileService
{
    /**
     * @var PostService
     */
    private $postService;

    /**
     * ProfileService constructor.
     * @param PostService $postService
     */
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|static|static[]
     */
    public function getProfileById($id)
    {
        return Profile::find($id);
    }

    /**
     * @param $slug
     * @return \___PHPSTORM_HELPERS\static|mixed
     */
    public function getProfileBySlug($slug)
    {
        return Profile::where('slug', $slug)->get()[0];
    }

    /**
     * @param $id
     * @param $name
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public function store($id, $name)
    {
        //Create a new profile for one user
        return Profile::create([
            'name' => $name,
            'slug' => uniqid(),
            'owner_id' => $id
        ]);
    }
}