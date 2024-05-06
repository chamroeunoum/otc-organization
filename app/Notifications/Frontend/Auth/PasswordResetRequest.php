<?php

namespace App\Notifications\Frontend\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PasswordResetRequest extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        ->subject('កំណត់ពាក្យសម្ងាត់ឡើងវិញ')
        ->greeting("សួស្ដី, " . $notifiable->lastname . ' ' . $notifiable->firstname )
        ->line('លេខកូដសម្រាប់កំណត់ពាក្យសម្ងាត់ឡើយវិញ ៖ ' . $notifiable->forgot_password_token )
        ->line('ប្រសិនបើអ្នកមិនបានស្នើរធ្វើប្រតិបត្តិការនេះទេ។ មានន័យថា អាចមានអ្នកដទៃកំពុងប្រើប្រាស់ គណនីរបស់អ្នក។');
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
