<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maddeler extends Model
{
    protected $table = 'alt_slide_madde';
    protected $fillable = ['baslik','madde_bir','madde_iki','madde_uc','madde_dort','madde_bes'];
}
