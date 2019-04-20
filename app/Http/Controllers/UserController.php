<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct()
    {
        $this->userService = app(UserService::class);
    }

    public function get($userId)
    {
        $user = $this->userService->get($userId);

        return view('user.profile', compact('user'));
    }
}
