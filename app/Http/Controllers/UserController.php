<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
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

    public function get($userId)
    {
        $user = $this->userService->get($userId);

        return view('user.profile', compact('user'));
    }

    public function edit($userId)
    {
        $user = $this->userService->get($userId);

        return view('user.edit', compact('user'));
    }

    public function updateUserData($userId, UpdateUserRequest $request)
    {
        User::where('id', $userId)
            ->update($request->only(['name','surname','email','phone','city']));
        $user = $this->userService->get($userId);

        $success = 'Ваш профиль успешно обновлен!';//нужно как то отправить
       return redirect("users/$userId/edit");

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

        $success_update_avatar = 'Ваше фото успешно обновлено!';
//        return redirect()->route('profile', [$user,]);
        return view('user.edit', compact(['user','success_update_avatar']));
//        return redirect()->action(
//            'UserController@profile', ['id' => 1]
//        );
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
