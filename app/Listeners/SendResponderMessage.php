<?php

namespace App\Listeners;

use Mail;
use App\Events\MessageWasResponder;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendResponderMessage
{

    /**
     * Handle the event.
     *
     * @param  MessageWasResponder  $event
     * @return void
     */
    public function handle(MessageWasResponder $event)
    {
        $message = $event->message;

        Mail::send('emails.respuest', ['msg' => $message],function($m) use($message){
            $m->to($message->email)
            ->subject('Mensaje de respuesta de Geotaxi');
        });
    }
}
