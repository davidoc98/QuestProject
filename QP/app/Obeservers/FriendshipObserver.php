<?php

namespace App\Observers;

use App\Models\Friendship;

class FriendshipObserver {
      public function creating(Friendship $friendship)
      {
          $friendship->author_id = Auth::id();
      }

}
