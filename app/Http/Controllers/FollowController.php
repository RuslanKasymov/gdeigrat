<?php

namespace App\Http\Controllers;

use App\Http\Requests\FollowRequest;
use App\Models\Follower;
use App\Services\UserService;
use Symfony\Component\HttpFoundation\Response;

class FollowController extends Controller
{
    public function follow(FollowRequest $request, UserService $userService)
    {
        $authUser = $userService->getAuthenticated();
        if ($this->exists($request->input('maintainer_id'), $authUser['id'])) {
            Follower::where([
                'maintainer_id' => $request->input('maintainer_id'),
                'follower_id' => $authUser->id
            ])->delete();

            return response()->json([
                'follow_message' => __('follow.unfollow'),
                'message' => __('follow.unfollow_success')
            ], Response::HTTP_OK);
        }

        Follower::create([
            'maintainer_id' => $request->input('maintainer_id'),
            'follower_id' => $authUser['id']
        ]);

        return response()->json([
            'follow_message' => __('follow.follow'),
            'message' => __('follow.follow_success')
        ], Response::HTTP_CREATED);
    }

    private function exists($maintainerId, $followerId)
    {
        return Follower::where([
            'maintainer_id' => $maintainerId,
            'follower_id' => $followerId])->exists();
    }
}
