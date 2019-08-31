<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class Kategoric extends Controller
{
    public function setKategori(Request $istek)
    {
    	try
    	{
    		unset($istek['_token']);
            $tarih = str_slug(Carbon::now());
            $slug = str_slug($istek->kategori_adi);
    		Kategori::create(['kategori_adi' => $istek->kategori_adi,'slug' => $slug]);
    		return ['cevap' => 'ok'];
    	}
    	catch(Exception $e)
    	{  		
    		return ['cevap' => $e];
    	}
    }

    public function deleteKategori(Request $istek)
    {
        try
        {
            unset($istek['_token']);
            Kategori::where('id',$istek->id)->delete();
            return ['cevap' => 'ok'];
        }
        catch(Exception $e)
        {       
            return ['cevap' => $e];
        }
    }
}
