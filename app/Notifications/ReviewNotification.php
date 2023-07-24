<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReviewNotification extends Notification
{
    use Queueable;

    public function __construct($request){

        $this->request = $request;
    }


    public function via($notifiable){

        return ['database','mail',];

    }


    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('new Review Added In News.')
                    ->action('View Review', url('/pending/review'))
                    ->line('Thank you for using our application!');
    }


    public function toArray($notifiable){

        return [

            'message'   => 'New Review Added In News',

        ];

    }
}
