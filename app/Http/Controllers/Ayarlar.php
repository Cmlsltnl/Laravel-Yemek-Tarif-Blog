<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Ayar;
use App\Iletisim;
use App\SosyalMedya;
use Validator;

class Ayarlar extends Controller
{
    public function setAyarlar(Request $istek)
    {
    	unset($istek['_token']);
    	$validation = Validator::make($istek->all(),[

    		'site_logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    		'site_baslik' => 'required|max:250',
    		'site_aciklama' => 'required|max:250',
    		'site_anahtar_kelimeler' => 'required|max:250'
    	]);

    	if($validation->passes())
    	{
    		if($istek->hasFile('site_logo'))
    		{
                $eskiresim = Ayar::all()->first();
                $yol = '/img/'.$eskiresim['site_logo'];
                Storage::delete($yol);

    			$resim = $istek->file('site_logo');
    			$rename = rand(0,100000).'.'. $resim->getClientOriginalExtension();
    			$resim->move(public_path('img'),$rename);
    			Ayar::where('id',1)->update(['site_logo'=>$rename,'site_baslik'=>$istek->site_baslik,'site_aciklama'=>$istek->site_aciklama,'site_anahtar_kelimeler'=>$istek->site_anahtar_kelimeler]);
                
    			return ['cevap'=>'ok'];
    		}
    		else
    		{

    			Ayar::where('id',1)->update(['site_baslik'=>$istek->site_baslik,'site_aciklama'=>$istek->site_aciklama,'site_anahtar_kelimeler'=>$istek->site_anahtar_kelimeler]);
    			return ['cevap'=>'ok'];
    		}
    		try
    		{
    			
    			$resim = $istek->file('site_logo');
    			$rename = rand(0,100000).'.'. $resim->getClientOriginalExtension();
    			$resim->move(public_path('img'),$rename);
    			Ayar::where('id',1)->update(['site_logo'=>$rename,'site_baslik'=>$istek->site_baslik,'site_aciklama'=>$istek->site_aciklama,'site_anahtar_kelimeler'=>$istek->site_anahtar_kelimeler]);
    			return ['cevap'=>'ok'];
    		}
    		catch(Exception $e)
    		{
    			return ['cevap'=>'error'];
    		}
    	}
    	else
    	{
    			return ['cevap'=> $validation->errors()->all()];
    	}
    }

    public function setIletisim(Request $istek)
    {
        unset($istek['_token']);
        $validation = Validator::make($istek->all(),[
            'adres' => 'required|max:250',
            'telefon' => 'required|max:11',
            'eposta' => 'required|email|max:250'
        ]);

        if($validation->passes())
        {
            try
            {
                Iletisim::where('id',1)->update($istek->all());
                return ['cevap' => 'ok'];
            }
            catch(Exception $e)
            {
               return ['cevap' => 'error']; 
            }

            
        }
        else
        {
            return ['cevap' => $validation->errors()->all()];
        }
    }

    public function setSosyalMedya(Request $istek)
    {
        unset($istek['_token']);
        $validation = Validator::make($istek->all(),[
            'facebook' => 'required|max:250',
            'twitter' => 'required|max:250',
            'instagram' => 'required|max:250',
            'youtube' => 'required|max:250'
        ]);

        if($validation->passes())
        {
            try
            {
                SosyalMedya::where('id',1)->update($istek->all());
                return ['cevap' => 'ok'];
            }
            catch(Exception $e)
            {
               return ['cevap' => 'error']; 
            }

            
        }
        else
        {
            return ['cevap' => $validation->errors()->all()];
        }
    }
    	
    	

    	
}

