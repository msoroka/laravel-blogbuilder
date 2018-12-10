<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class Newsletter extends Notification implements ShouldQueue
{
    use Queueable;

    protected $posts;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Collection $posts)
    {
        $this->posts = $posts;
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
        $mail = (new MailMessage())
            ->greeting('Nowe wpisy na blogu!');

        $this->posts->each(function ($post) use ($mail) {
            $mail->line(new HtmlString("<h2>{$post->name}</h2>"));
            $mail->line($post->content);
            $mail->line(new HtmlString('<hr>'));
        });

        $mail->action('Przejdź do bloga', route('home'));

        $mail->line(new HtmlString(sprintf(
            'Aby się wpisać przejdź pod ten <a href="%s">adres</a>.',
            route('newsletter.unsubscribe', [
                'email' => $notifiable->email,
                'code'  => $notifiable->unsubscribe_code,
            ])
        )));

        return $mail;
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
