<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SuccessMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $formData;

    public $messagesData;

    public $pdfData;

    public function __construct($formData, $messagesData, $pdfData = null)
    {
        $this->formData = $formData;
        $this->messagesData = $messagesData;
        $this->pdfData = $pdfData;
    }

    public function build()
    {

        $subject = $this->messagesData['title'];
        $mail = $this->from(config('mail.from.address'), config('mail.from.name'))->subject($subject)->view('emails.success-message');

        if ($this->pdfData) {
            $mail->attachData($this->pdfData, 'order_confirmation.pdf', [
                'mime' => 'application/pdf',
            ]);
        }

        return $mail;
    }
}
