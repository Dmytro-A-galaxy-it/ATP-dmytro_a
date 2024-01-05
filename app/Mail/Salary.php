<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Salary extends Mailable
{
    use Queueable, SerializesModels;


    public $driveName;
    public $salary;
    public $nextMonth;
    /**
     * Create a new message instance.
     */
    public function __construct($driveName, $salary, $nextMonth)
    {
        $this->driveName = $driveName;
        $this->salary = $salary;
        $this->nextMonth =$nextMonth;
    }

    public function build(){
        return $this->view('emails.salary')->with([
            'drivename' => $this->driveName,
            'salary' => $this->salary,
            'nextMonth' => $this->nextMonth
        ]);
    }

}
