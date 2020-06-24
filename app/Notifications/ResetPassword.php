<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class ResetPassword extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
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
            ->subject('Yêu cầu thay đổi mật khẩu')
            ->line('Bạn nhận được email này bởi vì chúng tối đã gửi tới tài khoản của bạn một yêu cầu thay đổi mật khẩu')
            ->action('Đặt lại mật khẩu', url('password/reset', $this->token))
            ->line(Lang::get('Yêu cầu này sẽ hết hạn trong :count phút.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]))
            ->line('Nếu bạn không có yêu cầu đặt lại mật khẩu, không cần nhấn vào nút "Đặt lại mật khẩu".');
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
