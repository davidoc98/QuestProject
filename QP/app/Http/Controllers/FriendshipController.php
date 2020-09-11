<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ProfileController;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Friendship;
use Illuminate\Support\Facades\Validator;

class FriendshipController extends Controller
{
    public function store(Request $request, $user_alias){
        $user = User::where('id', '=', $user_alias)->first();
        $user_id = Auth::user()->id;
        $condition = 0;
        $friend_id = $user->id;

        $setcondition = Friendship::create([
            'user_id' => $user_id,
            'condition' => $condition,
            'friend_id' => $friend_id,
        ]);
        return redirect()->back()->with('success', 'Запрос в друзья отправлен.');
    }
    public function show(Request $request, $user_alias){
        $user = User::where('id', '=', $user_alias)->first();

        $subscribers = Friendship::subscribers($user)->get();
        $friends = Friendship::friends($user)->get();
        $followers = Friendship::followers($user)->get();

//        $friendships_subscribers = Friendship::where('friend_id', $user->id)->where('condition', $condition = 0)->get();
//        $friendships_friends = Friendship::where('condition', $condition = 1)->where('friend_id', $user->id)->orWhere('user_id', $user->id)->get();
//        $user_id_friends = [];
//        foreach ($friendships_friends as $friendship_friend){
//            $user_id_friends[] = $friendship_friend->user_id;
//        }
//        $user_id_subscribers = [];
//        foreach ($friendships_subscribers as $friendship_subscriber){
//            $user_id_subscribers[] = $friendship_subscriber->user_id;
//        }
//        $subscribers = User::find($user_id_subscribers);
//        $friends = User::find($user_id_friends);

        return view('subscribers', compact('user', 'profile', 'subscribers', 'friends', 'followers'));
    }
    public function add(Request $request, $user_alias){
        $me = Auth::user();
        $user = User::where('id', '=', $user_alias)->first();
        $friendship =  Friendship::friendship($user, $me)->first();
        if(!$friendship) {
            $friendship = Friendship::create([
                'user_id' => $me->id,
                'condition' => 0,
                'friend_id' => $user->id,
            ]);
        } else {
            $friendship->condition = 1;
            $friendship->save();
        }

        return redirect()->back();
    }

    public function destroy(Request $request, $user_alias) {
        $me = Auth::user();
        $user = User::where('id', '=', $user_alias)->first();
        $friendship =  Friendship::friendship($user, $me)->first();
        if($friendship) {
            if($friendship->condition == 1 && $friendship->user_id == $me->id) {
                $friendship->user_id = $friendship->friend_id;
                $friendship->friend_id = $me->id;
                $friendship->condition = 0;
                $friendship->save();
            } else if($friendship->condition == 1 && $friendship->friend_id == $me->id) {
                $friendship->friend_id = $friendship->user_id;
                $friendship->user_id = $me->id;
                $friendship->condition = 0;
                $friendship->save();
            } else {
                $friendship->delete();
            }
        }

        return redirect()->back();
    }
}

