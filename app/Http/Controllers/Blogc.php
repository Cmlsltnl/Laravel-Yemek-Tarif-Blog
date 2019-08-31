<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Validator;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Image;

class Blogc extends Controller
{
    public function blogEkle(Request $istek)
    {
    	$validation = Validator::make($istek->all(),[
    		'resim' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    		'kategori' => 'required',
    		'icerik' => 'required',
    		'etiket' => 'required',
            'malzemeler' => 'required',
            'hazirlanma' => 'required',
            'pisirme' => 'required',
            'porsiyon' => 'required',
    	]);

    	if($validation->passes())
    	{
    		if($istek->hasFile('resim'))
    		{
    			try{
                    $gelenresim = $istek->file('resim');
                    $yol = rand(0,100000000).'.'.$gelenresim->getClientOriginalExtension();
                    $resim =  Image::make($istek->file('resim'))->resize(500, 430);
                    $resim->save(public_path('/img/'.$yol));
    			 
                    
	    			
                
	    			$yazar = Auth::user()->id;
	    			$tarih = str_slug(Carbon::now());
	                $slug = str_slug($istek->baslik).'-'.$tarih;
	                $hit = 0;
	                $derece = 0;
	                Blog::create(['baslik' => $istek->baslik,'resim' => $yol,'yazar' => $yazar,'kategori' => $istek->kategori,'icerik' => $istek->icerik,'etiket' => $istek->etiket,'slug' => $slug,'hit' => $hit,'derece' => $derece,'malzemeler' => $istek->malzemeler,'hazirlanma' => $istek->hazirlanma,'pisirme'=>$istek->pisirme,'porsiyon' => $istek->porsiyon]);
	                return ['cevap' => 'ok'];
    			}
    			catch(Exception $e)
    			{
    				return ['cevap' => $e];
    			}
    			

    		}
    		else
    		{
    			 return ['cevap' => 'error'];
    		}
    	}
    	else
    	{
    		return ['cevap' => $validation->errors()->all()];
    	}
    }

    public function blogSil(Request $istek)
    {
        try
        {
            $eskiresim = Blog::where('id',$istek->id)->get();
            $yol = '/img/'.$eskiresim[0]->resim;
            Storage::delete($yol);
            Blog::where('id',$istek->id)->delete();
            return ['cevap' => true];
        }
        catch(Exception $e)
        {
            return ['cevap' => false];
        }
        
    }
}
