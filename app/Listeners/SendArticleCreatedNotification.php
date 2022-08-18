<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\ArticleCreated;
use App\Notifications\ArticleCreated as NotificationArticleCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendArticleCreatedNotification
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
     * @param  \App\Events\ArticleCreated  $event
     * @return void
     */
    public function handle(ArticleCreated $event)
    {
        $adminMail = config('mail.toAdmin');
        if ($adminMail)
        {
            $user = User::where('email', $adminMail)->first();
            if ($user)
            {
                $user->notify(new NotificationArticleCreated($event->article));
            }
        }
    }
}
