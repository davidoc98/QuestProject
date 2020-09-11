<?php

namespace App\Observers;

use App\Models\Post;

class PostObserver {
      public function creating(Post $post)
      {
          $post->author_id = Auth::id();
      }

}
