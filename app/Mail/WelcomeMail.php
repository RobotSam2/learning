<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Model\Applicant\Sex as Sex;
use App\Model\Website\Content as Content;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $message = Content::where("slug", "welcome-message")->first()->content;
        return $this->markdown('emails.welcome')->subject('Thanks for Your Application!')->with('message', $message);
    }
}
