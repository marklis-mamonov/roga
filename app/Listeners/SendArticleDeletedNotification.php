<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\ArticleDeleted;
use App\Notifications\ArticleDeleted as NotificationArticleDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendArticleDeletedNotification
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
     * @param  \App\Events\ArticleDeleted  $event
     * @return void
     */
    public function handle(ArticleDeleted $event)
    {
        $adminMail = config('mail.toAdmin');
        if ($adminMail)
        {
            $user = User::where('email', $adminMail)->first();
            if ($user)
            {
                $user->notify(new NotificationArticleDeleted($event->article));
            }
        }
    }
}
