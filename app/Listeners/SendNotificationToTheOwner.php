<?php

namespace App\Listeners;

use Mail;
use App\Events\MessageWasRecived;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNotificationToTheOwner
{
    /**
     * Handle the event.
     *
     * @param  MessageWasRecived  $event
     * @return void
     */
    public function handle(MessageWasRecived $event)
    {
        $message = $event->message;

        if(auth()->check())
        {
            $message->email = auth()->user()->email;
        }
        Mail::send('emails.notification', ['msg' => $message],function($m) use($message){
            $m->from($message->email, $message->nombre)
            ->to('juanbpadillac@gmail.com')
            ->subject('Nuevo mensaje');
        });
    }
}
