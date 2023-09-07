<?php

namespace App\Jobs;

use App\Notifications\EmailNotification;
use App\Notifications\MarketingNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class MarketingMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $user;
    protected $email;
    public function __construct($user,$email)
    {
        $this->user=$user;
        $this->email=$email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if($this->email['type']=='email'){
            try {
                Notification::send($this->user, new MarketingNotification($this->email));
            } catch (\Exception $th) {
            // dd($th);
            }
        }
    //    foreach($this->user as $user){
    //     $project = [
    //         'greeting' => 'Hello ' . $user['name'] . ',',
    //         'subject' => 'Best offers',
    //         'body' => 'New offers are available. Buy products now',
    //         'actionText' => 'Dashboard',
    //         'actionURL' => url('/login'),
    //         'id' => $user['id']
    //     ];
    //     try {
    //         Notification::send($user, new EmailNotification($project));
    //     } catch (\Exception $th) {
    //     // dd($th);
    //     }
    //    }
    }
}
