<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ThankEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    

    public $drivename;
    /**
     * Create a new message instance.
     */
    public function __construct($drivename)
    {
        $this->drivename = $drivename;
        
    }

    public function build(){

        return $this->view('emails.thank')->with(['drivename' => $this->drivename]);
    }
}
