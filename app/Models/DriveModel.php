<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\DriveDeleting;
use App\Mail\ThankEmail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class DriveModel extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'surname',
        'birthday',
        'photo',
        'salary',
        'email',
        'user_id'
    ];


    public static function boot()
    {
        parent::boot();

        self::deleting(function($model) {
            Mail::to($model->email)->send((new ThankEmail($model->name))->delay(10));
        });
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }

    public function getNameAttribute($value){
        return $this->attributes['name'] = ucwords($value);
    }

    public function getAgeAttribute()
    {
        $date1 = Carbon::now();
        $date2 = Carbon::createFromFormat('Y-m-d', $this->birthday);
        return $date1->diffInYears($date2);
    }

    public function setPhotoAttribute($value)
    {
        $attribute_name = "photo";
        $disk = "public";
        $destination_path = "public/storage";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path, $fileName = null);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
