<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SosyalMedya extends Model
{
    protected $table = 'sosyalmedya';
    protected $fillable = ['facebook','twitter','instagram','youtube'];
}
