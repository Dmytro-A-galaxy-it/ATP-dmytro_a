<?php

namespace App\Models;

use App\Events\DriveDeleting;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusModel extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'deg_namber',
        'brand_id',
        'drive_id'
    ];

    public function setDegnamberAttribute($value){
        $this->attributes['deg_namber'] = strtolower($value);
    }

    public function brand()
    {
        return $this->belongsTo(CarBrand::class, 'brand_id');
    }

    public function drive_model()
    {
        return $this->belongsTo(DriveModel::class, 'drive_id');
    }
}
