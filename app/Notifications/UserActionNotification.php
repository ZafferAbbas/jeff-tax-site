<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\NexmoMessage;
use App\User;

class UserActionNotification extends Notification
{
    use Queueable;

    public $action;
    public $details;

    public function __construct($action, $details)
    {
        $this->action = $action;
        $this->details = $details;
    }

    public function via($notifiable)
    {
        return ['database'];  // Here you can specify multiple channels like ['mail', 'database']
    }

    public function toArray($notifiable)
    {
        return [
            'action' => $this->action,
            'details' => $this->details,
        ];
    }
    public function toMail($notifiable)
    {
        // Identify admin users (modify this based on your admin identification logic)
        $adminUsers = User::where('role', 'admin')->get();

        foreach ($adminUsers as $adminUser) {
            // Send the notification to each admin user
            $adminUser->notify($this);
        }
    }
}