<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atp extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
        'phone',
        'description'
    ];


    public function setLogoAttribute($value){
        $atrtribute_name = "logo";
        $disk = 'public';
        $description_path = 'public/logo';

        $this->uploadFileToDisk($value, $atrtribute_name, $disk, $description_path, $fileName = null);
    }
}
