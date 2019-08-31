<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Sliders;
use App\AltSlide;
use App\Maddeler;
use Illuminate\Support\Facades\Storage;

class Slidersm extends Controller
{
    public function setSlide(Request $istek)
    {
    	unset($istek['_token']);
    	$validation = Validator::make($istek->all(),[
    		'slider_resim' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
    		'slider_metin' => 'required|max:255'
    	]);

    	if($validation->passes())
    	{
    		if($istek->hasFile('slider_resim'))
    		{
    			$resim = $istek->file('slider_resim');
    			$rename = rand(0,100000).'.'.$resim->getClientOriginalExtension();
    			$resim->move(public_path('img'),$rename);
    			Sliders::insert(['slider_resim'=> $rename,'slider_metin' => $istek->slider_metin]);
    			return ['cevap' => 'ok'];
    		}
    		else
    		{
    			return ['cevap' => 'resim'];
    		}	
    	}
    	else
    	{
    			return ['cevap' => $validation->errors()->all()];
    	}
    }

    public function deleteSlide(Request $istek)
    {
    	try 
    	{
                $eskiresim = Sliders::select()->where('id',$istek->id)->get();
                foreach ($eskiresim as $key) {
                    $sil = $key;
                }           
                $yol = '/img/'.$sil['slider_resim'];
                Storage::delete($yol);

    		      Sliders::where('id',$istek->id)->delete();
        

    		return ['cevap' => 'ok'];
    	}
    	catch(Exception $e)
    	{
    		return ['cevap' => 'error'];
    	}
    }

    public function setAltSlide(Request $istek)
    {
        unset($istek['_token']);

        $validation = Validator::make($istek->all(),[
            'altslide_resim' => 'required|image|mimes:jpeg,jpg,gif,png'
        ]);

        if($validation->passes())
        {
            if($istek->hasFile('altslide_resim'))
                {
                    try
                    {
                        $resim = $istek->file('altslide_resim');
                        $rename = rand(0,100000).'.'.$resim->getClientOriginalExtension();
                        $resim->move(public_path('img'),$rename);
                        AltSlide::insert(['altslide_resim' => $rename]);
                        return ['cevap' => 'ok'];
                    }
                    catch(Exception $e)
                    {
                        return ['cevap' => 'error'];
                    }
           


                }
        }
        else
        {
            return ['cevap' => 'resim'];
        }       
    }

    public function setMadde(Request $istek)
    {
        unset($istek['_token']);
        $validation = Validator::make($istek->all(),[

            'madde_bir' => 'required|max:255',
            'madde_iki' => 'required|max:255',
            'madde_uc' => 'required|max:255',
            'madde_dort' => 'required|max:255',
            'madde_bes' => 'required|max:255'
        ]);

        if($validation->passes())
        {
            try
            {
                Maddeler::where('id',1)->update($istek->all());
                
                return ['cevap' => true];
            }
            catch(Exception $e)
            {
                return ['cevap' => false];
            }
            
        }
        else
        {
            return ['cevap' => $validation->errors()->all()];
        }
    }

    public function deleteAltSlide(Request $istek)
    {
        try 
        {
            $eskiresim = AltSlide::select('altslide_resim')->where('id',$istek->id)->get();
            foreach ($eskiresim as $es) {
                $ses = $es;
            }
            $yol = '/img/'.$ses['altslide_resim'];
            AltSlide::where('id',$istek->id)->delete(); 
            Storage::delete($yol);
            return ['cevap' => 'ok'];
        }
        catch(Exception $e)
        {
            return ['cevap' => 'error'];
        }           
    }





}
