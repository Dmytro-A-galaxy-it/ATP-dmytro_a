<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
