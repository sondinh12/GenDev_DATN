<?php

namespace App\Observers;

use App\Models\Post;
use App\Models\PostsHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    public function created(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "updated" event.
     */
    public function updated(Post $post)
    {
        $changes = $post->getChanges();
        unset($changes['updated_at']);

        if (count($changes) > 0) {
            PostsHistory::create([
                'post_id' => $post->id,
                'user_id' => Auth::id(),
                'fields_changed' => json_encode(array_keys($changes)),
                'old_value' => json_encode(Arr::only($post->getOriginal(), array_keys($changes))),
                'new_value' => json_encode($changes),
            ]);
        }
    }

    /**
     * Handle the Post "deleted" event.
     */
    public function deleted(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "restored" event.
     */
    public function restored(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     */
    public function forceDeleted(Post $post): void
    {
        //
    }
}
