<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailInterview extends Mailable
{
    use Queueable, SerializesModels;
    protected $candidate;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($candidate)
    {
        $this->candidate = $candidate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from'))
        ->subject('Thư Mời Phỏng Vấn - Công Ty Cổ Phần Bellsystem24-HoaSao')
        ->view('candidates.send_mail_interview', ['candidate' => $this->candidate]);
    }
}
