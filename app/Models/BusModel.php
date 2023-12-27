<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'deg_namber',
        'brand_id',
        'drive_id'
    ];
}
