<?php

namespace App\Mail\SignUp;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendOTP extends Mailable
{
    use Queueable, SerializesModels;

    public array $content;

    /**
     * Create a new message instance.
     */
    public function __construct(array $content)
    {
        $this->content = $content;
    }

    /**
     * Get the message envelope.
     */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: 'Send O T P',
    //     );
    // }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->subject($this->content['subject'])
            ->view('SignUp.SendOTP');
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
