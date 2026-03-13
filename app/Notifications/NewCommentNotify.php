<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Str;

class NewCommentNotify extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        public string $article_title,
        public int $article_id,
        public string $comment_text,
        public string $author_name,
    ) {
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    -> line('The introduction to the notification.')
                    -> action('Notification Action', url('/'))
                    -> line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toDatabase(object $notifiable): array
    {
        return [
            'title' => 'Новый комментарий к статье "'.$this->article_title.'"',
            'article_title' => $this->article_title,
            'article_id' => $this->article_id,
            'comment_excerpt' => Str::limit($this->comment_text, 80),
            'author_name' => $this->author_name,
        ];
    }
}