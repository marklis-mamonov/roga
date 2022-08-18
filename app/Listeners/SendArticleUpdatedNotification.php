<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\ArticleUpdated;
use App\Notifications\ArticleUpdated as NotificationArticleUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendArticleUpdatedNotification
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
     * @param  \App\Events\ArticleUpdated  $event
     * @return void
     */
    public function handle(ArticleUpdated $event)
    {
        $adminMail = config('mail.toAdmin');
        if ($adminMail)
        {
            $user = User::where('email', $adminMail)->first();
            if ($user)
            {
                $user->notify(new NotificationArticleUpdated($event->article));
            }
        }
    }
}
