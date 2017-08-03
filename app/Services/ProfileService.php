<?php
/**
 * Created by Marcus.
 * Date: 01/08/17
 * Time: 16:54
 */

namespace DroneBox\Services;


use DroneBox\Models\Profile;
use Illuminate\Http\Request;

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
     * @param $search
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function search($search)
    {
        return Profile::where('name', 'like', '%'.$search.'%')->orWhere('slug', $search)->get();
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|static|static[]
     */
    public function profileById($id)
    {
        return Profile::find($id);
    }

    /**
     * @param $slug
     * @return \___PHPSTORM_HELPERS\static|mixed
     */
    public function profileBySlug($slug)
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

    /**
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|\Illuminate\Http\JsonResponse|null|static|static[]
     */
    public function update(Request $request)
    {
        if(Profile::find($request['id'])->update($request->all()))
            return Profile::find($request['id']);
        else
            return response()->json([
                'message' => 'Can\'t update this profile'
            ], 400);
    }
}