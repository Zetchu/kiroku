<?php

namespace App\Jobs;

use App\Models\Comments;
use App\Models\User;
use App\Notifications\ToxicCommentAlert;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class AnalyzeCommentForToxicityJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public Comments $comment)
    {
    }

    public function handle(): void
    {
        $badWords = ['idiot', 'stupid', 'hate', 'scam', 'fuck', 'shit', 'retard'];

        foreach ($badWords as $word) {
            if (Str::contains(strtolower($this->comment->content), $word)) {

                $admins = User::where('is_admin', true)->get();
                foreach ($admins as $admin) {
                    $admin->notify(new ToxicCommentAlert($this->comment, $word));
                }

                break;
            }
        }
    }
}