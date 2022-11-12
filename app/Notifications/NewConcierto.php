<?php

namespace App\Notifications;

use App\Concierto;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class NewConcierto extends Notification
{
    use Queueable;
    protected $concierto;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Concierto $concierto)
    {
        $this->concierto = $concierto;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->from(config('mail.from.name'))
                    ->subject(Lang::get('mails.concierto.create.title', ['conciertoName' => $this->concierto->nombre]))
                    ->line(Lang::get($this->concierto->rentabilidad >= 0 ? 'mails.concierto.create.benefits' : 'mails.concierto.create.bills',
                                        [
                                            'conciertoId' => $this->concierto->id,
                                            'rentabilidad' => $this->concierto->rentabilidad,
                                        ]
                                    )
                            )
                    ->line('Thank you!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
