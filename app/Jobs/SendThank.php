<?php

namespace App\Jobs;

use App\Mail\ThankEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendThank implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected $drivename;
    /**
     * Create a new job instance.
     */
    public function __construct($drivename)
    {
        $this->drivename = $drivename;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
    }
}
