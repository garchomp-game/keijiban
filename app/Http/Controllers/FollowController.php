<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
use App\Models\User;
class FollowController extends Controller
{
    /**
     * フォローアクションが白化されたらデータベースにフォロー関係を登録
     *
     * @param App\User $user フォロー先のユーザー
     */
    public function follow(User $user)
    {
        Follow::follow($user->id, user('id'));
        return response()->back();
    }

    /**
     * アンフォローしたらデータベースのカラムを物理削除することで対応する
     *
     * @param App\User $user フォロー先のユーザー
     */
    public function unfollow(User $user)
    {
        Follow::unfollow($user->id, user('id'));
        return response()->back();
    }
}
