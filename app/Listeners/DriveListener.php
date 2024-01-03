<?php

namespace App\Listeners;
use App\Models\BusModel;
use App\Events\DriveDeleting;
use App\Models\DriveModel;
use Database\Seeders\Drive;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DriveListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(DriveModel $event): void
    {
        
    }
}
