<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class DriveModel extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'birthday',
        'photo',
        'salary',
        'email'
    ];

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
}
