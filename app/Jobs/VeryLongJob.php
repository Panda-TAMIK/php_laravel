<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\CommentMail;
use App\Models\Article;
use App\Models\Comment;




class VeryLongJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Article $article, public Comment $comment, public $author)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            Mail::to('fedor.tarasov.2007@mail.ru')
                ->send(new CommentMail($this->comment, $this->article, $this->author));
        } catch (\Throwable $e) {
            // In local/dev environment we ignore mail transport errors
            // so that comments saving is not blocked by SMTP issues.
        }
    }
}