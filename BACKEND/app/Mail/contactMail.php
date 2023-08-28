<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class contactMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $name;
    protected $phone;
    protected $email;
    protected $description;
    /**
     * Create a new message instance.
     */
    public function __construct($name, $email, $phone, $description)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->description = $description;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            replyTo: $this->email,
            subject: "Contact By {$this->name} <{$this->email}>"
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new content(
            htmlString: "<div style='padding: 2rem;border-radius: 1rem;background: rgb(245,245,245);max-width: 600px;margin: 2rem auto;'>
        <h1 >Varoon Valley</h1>
        <p style='margin: 2rem 0;font-size: 1rem;'>{$this->description}</p>
        <h4>ALl The Best, {$this->name}</h4>
        <p>VaroonValley.com, All rights reserved.</p>
    </div>"
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
