<?php

namespace App\Listeners;

use App\Events\PostCommented;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class PostCommentedLogListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PostCommented  $event
     * @return void
     */
    public function handle(PostCommented $event)
    {
        Log::info($event->post);
    }
}
