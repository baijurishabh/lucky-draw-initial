<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\EmailNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class WinnerExpiryAlert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'winner:expiryalert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user=User::whereHas('winner',function($q){
            $q->where('redeemed','NO')->where('countdown','>=',Carbon::now());
         })->get();
         foreach($user as $user){
            $project = [
                'greeting' => 'Hello ' . $user->name . ',',
                'subject' => 'Hurry Up',
                'body' => 'Your pool win will expires soon',
                'actionText' => 'Dashboard',
                'actionURL' => url('/login'),
                'id' => $user->id
            ];
            try {
                Notification::send($user, new EmailNotification($project));
            } catch (\Throwable $th) {
                //throw $th;
            }
         }

    }
}
