<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DriverOld extends Mailable
{
    use Queueable, SerializesModels;

    public $driveName;
    public $number;

    /**
     * Create a new message instance.
     */
    public function __construct($driveName, $number)
    {
        $this->driveName = $driveName;
        $this->number = $number;
    }

    public function build(){
        return $this->view('emails.old')->with([
            'drivename' => $this->driveName,
            'number' => $this->number
        ]);
    }
}
