<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;
use App\Models\Post;
use App\Models\Friendship;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'firstname', 'surname', 'linkname', 'email', 'avatar', 'password',
    ];

    public function getFullNameAttribute(){
      return "{$this->firstname} {$this->surname}";
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function posts() {
        return $this->hasMany(\App\Models\Post::class);
    }

    public function friendships() {
        return $this->hasMany(\App\Models\Friendship::class);
    }

    public function getFriendshipStatusAttribute()
    {
        $me = Auth::user();
        if($this->id == $me->id) {
            return 'MY_PROFFILE';
        } else {
            $friendship = Friendship::friendship($me, $this)->first();
            if($friendship) {
                if ($friendship->condition == 1) return 'FRIEND';
                else {

                    if($me->id == $friendship->user_id) return 'FOLLOWER';
                    else if ($me->id == $friendship->friend_id) return 'SUBSCRIBER';
                }
            } else RETURN 'EMPTY';
        }
    }

}
