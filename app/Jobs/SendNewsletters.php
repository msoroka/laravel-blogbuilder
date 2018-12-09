<?php

namespace App\Jobs;

use App\Models\Post;
use App\Models\Subscriber;
use App\Notifications\Newsletter;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;

class SendNewsletters implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $posts = Post::query()
            ->where('created_at', '>=', Carbon::now()->subWeek())
            ->where('status', '2')
            ->get();

        if ($posts->isEmpty()) {
            return;
        }

        $subscribers = Subscriber::all();

        $subscribers->each(function ($subscriber) use ($posts) {
            $subscriber->notify(new Newsletter($posts));
        });
    }
}
