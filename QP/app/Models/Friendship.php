<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Friendship extends Model
{
    protected $fillable = [
        'id', 'user_id', 'condition', 'friend_id',
    ];

    public function user() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function friend() {
        return $this->belongsTo('App\User', 'friend_id', 'id');
    }

    protected $hidden = [
        'created_at',
    ];

    public function scopeFriends($query, $user)
    {
        return $query->where(function ($query) use ($user) {
            $query->where('friend_id', $user->id);
            $query->orWhere('user_id', $user->id);
        })->where('condition', 1);
    }

    public function scopeSubscribers($query, $user)
    {
        return $query->where('friend_id', $user->id)->where('condition', 0);
    }

    public function scopeFollowers($query, $user)
    {
        return $query->where('user_id', $user->id)->where('condition', 0);
    }

    public function scopeFriendship($query, $user1, $user2)
    {
        return $query->where(function ($query) use ($user1, $user2) {
            $query->where('friend_id', $user1->id);
            $query->where('user_id', $user2->id);
        })->orWhere(function ($query) use ($user1, $user2) {
            $query->where('friend_id', $user2->id);
            $query->where('user_id', $user1->id);
        });
    }
}
