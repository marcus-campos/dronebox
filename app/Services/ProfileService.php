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