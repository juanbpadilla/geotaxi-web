<?php

namespace App\Listeners;

use Mail;
use App\Events\MessageWasRecived;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendAutoresponder
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
        Mail::send('emails.contact', ['msg' => $message],function($m) use($message){
            $m->to($message->email, $message->nombre)->subject('Tu mensaje fue recibido');
        });
    }
}
