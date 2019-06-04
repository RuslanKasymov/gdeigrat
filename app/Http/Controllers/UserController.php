<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use App\Services\FollowService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

class UserController extends Controller
{
    protected $userService;

    public function __construct()
    {
        $this->userService = app(UserService::class);
    }

    public function get($userId, FollowService $followService)
    {
        $user = $this->userService->get($userId);

        $user->setFollowersCount($followService->getFollowers($userId)->count());
        $user->setMaintainersCount($followService->getMaintainers($userId)->count());

        if (!empty($this->getAuthenticated() && $followService->exists(['maintainer_id' => $userId, 'follower_id' => $this->getAuthenticated()->id]))) {
            $user->setIsFollowerFlag(true);
        } else {
            $user->setIsFollowerFlag(false);
        }

        return view('user.profile', compact('user'));
    }

    public function edit($userId, Request $request)
    {
        $user = $this->userService->get($userId);

        $success = $request->input('success');
        $success_update_avatar = $request->input('success_update_avatar');

        return view('user.edit', compact(['user', 'success', 'success_update_avatar']));
    }

    public function updateUserData($userId, UpdateUserRequest $request)
    {
        User::where('id', $userId)
            ->update($request->only(['name', 'surname', 'email', 'phone', 'city']));

        return redirect("users/$userId/edit?success=1");
    }

    public function updateAvatar($userId, Request $request)
    {
        $user = $this->userService->get($userId);
        if ($request->hasFile('avatar')) {
            if ($user->avatar != '/uploads/avatars/default.jpg') {
                File::delete(public_path($user->avatar));
                File::delete(public_path($user->avatar_small));
            }
            $avatar = $request->file('avatar');

            $filename = time() . "_{$user->id}.{$avatar->getClientOriginalExtension()}";
            $filename_small = time() . "_{$user->id}_small.{$avatar->getClientOriginalExtension()}";

            Image::make($avatar)->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->crop(300, 300)->save($this->getPathToAvatars($filename));

            Image::make($avatar)->resize(null, 60, function ($constraint) {
                $constraint->aspectRatio();
            })->crop(60, 60)->save($this->getPathToAvatars($filename_small));


            $user->avatar = "/uploads/avatars/$filename";
            $user->avatar_small = "/uploads/avatars/$filename_small";
            $user->save();
        }

        return redirect("users/$userId/edit?success_update_avatar=1");
    }

    public function getAuthenticated()
    {
        return auth()->user();
    }

    private function getPathToAvatars($file)
    {
        return public_path('/uploads/avatars/' . $file);
    }
}
