<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostPublicationMail extends Mailable
{
    use Queueable, SerializesModels;
    private $post;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($post)
    {
       $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $post = $this->post;
        return $this->view('mails.posts.publication', compact('post'));
    }
}
