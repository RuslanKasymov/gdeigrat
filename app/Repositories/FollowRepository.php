<?php


namespace App\Repositories;


use App\Models\Follower;

class FollowRepository
{
    public function all($options){
        return Follower::where($options);
    }

    public function exists($options){
        return Follower::where($options)->exists();
    }
}