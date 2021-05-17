<?php

namespace App\Mail;

use App\InternshipPost;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class subscribeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $internshipPost;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(InternshipPost $internshipPost)
    {
        $this->internshipPost = $internshipPost;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Email.test')->subject('test')->with(['intern' => $this->internshipPost]);
    }
}
