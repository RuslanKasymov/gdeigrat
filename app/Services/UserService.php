<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    protected $userRepository;

    public function __construct()
    {
        $this->userRepository = app(UserRepository::class);
    }

    public function get($id)
    {
        return $this->userRepository->get($id);
    }

    public function getAuthenticated()
    {
        return auth()->user();
    }
}
