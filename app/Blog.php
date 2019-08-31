<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table='blog';
    protected $fillable = ['resim','baslik','kategori','icerik','etiket','yazar','hit','derece','slug','created_at','updated_at','malzemeler','porsiyon','pisirme','hazirlanma','porsiyon'];

    public function getKategori()
    {
    	return $this->hasOne('App\Kategori','id','kategori');
    }
}


