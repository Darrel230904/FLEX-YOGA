<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ResetPasswordOTP extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * One-time password / verification code.
     *
     * @var int
     */
    public $otp;

    // Menerima data OTP dari Controller
    /**
     * @param int $otp
     */
    public function __construct($otp)
    {
        $this->otp = $otp;
    }

    // Judul Email yang akan muncul di Inbox user
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Flex Yoga - Your Verification Code',
        );
    }

    // Mengarahkan ke file tampilan/desain email
    public function content(): Content
    {
        return new Content(
            view: 'emails.otp', 
        );
    }
}