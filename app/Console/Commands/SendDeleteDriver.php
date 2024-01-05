<?php

namespace App\Console\Commands;

use App\Mail\DriverOld;
use App\Models\BusModel;
use App\Models\DriveModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class SendDeleteDriver extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send delete drivers';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $drivers = DriveModel::all();
        $date1 = Carbon::now();
        $role = DB::table('roles')->where('name','Admin')->get();
        $has_roles = DB::table('model_has_roles')->where('role_id',$role[0]->id)->get()->toArray();   
    

        foreach($drivers as $driver){
            $date2 = Carbon::createFromFormat('Y-m-d', $driver->birthday);
            if($date1->diffInYears($date2) > 65) {

                $numbers = BusModel::where('drive_id', $driver->id)->get();

                if(isset($has_roles)){
                    foreach($has_roles as $rol){
                        $user = User::where('id', $rol->model_id)->get();
                        Mail::to($user[0]->email)->send(new DriverOld($driver->name, $numbers));
                    }
                }

                $driver->delete();
            }
        }
    }
}
