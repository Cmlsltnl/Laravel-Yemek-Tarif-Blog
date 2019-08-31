<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ayar extends Model
{
    protected $table = 'ayarlar';
    protected $fillable = ['site_logo','site_baslik','site_aciklama','site_anahtar_kelimeler'];
}
