<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sliders extends Model
{
    protected $table='slider';
    protected $fillable = ['slider_resmi','slider_metni','created_at','updated_at'];

}
