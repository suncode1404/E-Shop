<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class GuiEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $name = '';
    public $subject = '';
    public $email = '';
    public $phone = '';
    public $text = '';
    /**
     * Create a new message instance.
     */
    public function __construct($name, $subject, $email, $phone, $message)
    {
        $this->name = $name;
        $this->subject = $subject;
        $this->email = $email;
        $this->phone = $phone;
        $this->text = $message;
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Mail liên hệ từ khách hàng',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'client/form/viewMail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
