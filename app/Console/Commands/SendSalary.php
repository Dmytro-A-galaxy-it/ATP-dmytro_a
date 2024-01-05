<?php

namespace App\Console\Commands;

use App\Mail\Salary;
use App\Models\DriveModel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendSalary extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'salary:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send salary email to all drivers';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $drivers = DriveModel::all();
        
        foreach($drivers as $driver){
            $this->sendNotification($driver);
        }

        echo 'Salary sent yes!' . PHP_EOL;
    }

    protected function sendNotification($driver){
        $nextMonth = now()->addMonth()->format('F');
        Mail::to($driver->email)->send(new Salary($driver->name, $driver->salary, $nextMonth));
    }
}
