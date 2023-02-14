<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Str;
/**
 * $ sail artisan make:observer PostObserver --model=Post // following cmd is used to create the observer which listen
 *  for the Model Events like (Retrieved, Creating, Created, Updating, Updated,Saving, Deleting, etc...)
 * 
 * Note:- add the following (Post::observe(PostObserver::class);) to AppServiceProvider.php/EventServiceProvider.php 
 * boot method to register the Observer for the Model 
 * - Creating event/observer is used to modify row or add values (slug) to row before inserting into the tables.
 */
class PostObserver
{
    /**
     * Handle the Post "created" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function Creating(Post $post)
    {
        $post->slug = Str::slug($post->title);
    }

    /**
     * Handle the Post "created" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function Created(Post $post)
    {
        // $post->title = $post->title . "-another";
        // $post->save();
    }

    /**
     * Handle the Post "updated" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function updated(Post $post)
    {
        //
    }

    /**
     * Handle the Post "deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function deleted(Post $post)
    {
        //
    }

    /**
     * Handle the Post "restored" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function restored(Post $post)
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        //
    }
}
