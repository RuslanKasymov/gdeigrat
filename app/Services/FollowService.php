<?php


namespace App\Services;


use App\Repositories\FollowRepository;

class FollowService
{
    protected $followRepository;

    public function __construct()
    {
        $this->followRepository = app(FollowRepository::class);
    }

    public function getFollowers($userId){
        return $this->followRepository->all(['maintainer_id' => $userId]);
    }

    public function getMaintainers($userId){
        return $this->followRepository->all(['follower_id' => $userId]);
    }

    public function exists($options){
        return $this->followRepository->exists($options);
    }
}