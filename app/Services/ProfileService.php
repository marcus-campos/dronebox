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
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|static|static[]
     */
    public function getProfile($id)
    {
        return Profile::find($id);
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