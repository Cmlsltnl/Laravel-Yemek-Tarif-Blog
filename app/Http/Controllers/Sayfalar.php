<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ayar;
use App\iletisim;
use App\SosyalMedya;
use App\Sliders;
use App\AltSlide;
use App\Maddeler;
use App\Kategori;
use App\Blog;
use Illuminate\Support\Facades\Auth;

class Sayfalar extends Controller
{
    public function app()
    {
        $genelayar = Ayar::all()->first();
        $it = Iletisim::all()->first();
        $ss = SosyalMedya::all()->first();
        $maddeler = Maddeler::all()->first();
        $resimler = AltSlide::all();
        $genelayar = (['it' => $it ,'ss' => $ss,'site' => $genelayar , 'altslide' => $resimler , 'maddeler' => $maddeler]);
        return $genelayar;
    }

	public function getIndex()
	{
        $sliderveri = Sliders::all();
        $bloglar = Blog::orderBy('id','desc')->take(6)->get();
        $populerbloglar = Blog::orderBy('hit','desc')->take(5)->get();
        $begenilenbloglar = Blog::orderBy('hit','asc')->take(5)->get();
		return view('index')->with('slider',$sliderveri)->with('ayar',$this->app())->with('bloglar',$bloglar)->with('pop',$populerbloglar)->with('begenilenbloglar',$begenilenbloglar);
	}

    public function getTarif($slug)
    {
        $newslug = explode('/',$slug);
        $blog = Blog::where('slug',$newslug[1])->get();
        $hitart = $blog[0]->hit += 1;
        $hitarttir = Blog::where('slug',$newslug[1])->update(['hit' => $hitart]);

        return view('tarif')->with('blog',$blog)->with('ayar',$this->app());
    }

    public function getTumTarifler()
    {
        $trf = Blog::paginate(6);
        return view('tarifler')->with('tarifler',$trf)->with('ayar',$this->app());
    }

    public function getTumKategoriler()
    {
        $trf = Kategori::paginate(6);
        return view('kategoriler')->with('tarifler',$trf)->with('ayar',$this->app());
    }

    public function getKategoriyeGore($slug)
    {
        $kat = Kategori::where('slug',$slug)->get();
        $bloglar = Blog::where('kategori',$kat[0]->id)->paginate(6);
        return view('kategore')->with('bloglar',$bloglar)->with('ayar',$this->app())->with('slug',$slug)->with('kategori',$kat);
    }



	/* ###################### PANEL ###################### */



    public function getAdminIndex()
    {
    	$ayarlar = Ayar::all()->first();
    	return view('admin.siteayar')->with('ayarlar',$ayarlar);
    }

    public function getIletisim()
    {   
        $ayarlar = Iletisim::all()->first();	
    	return view('admin.iletisim')->with('ayarlar',$ayarlar);
    }

    public function getSosyalMedya()
    {  
        $ayarlar = SosyalMedya::all()->first();
    	return view('admin.sosyalmedya')->with('ayarlar',$ayarlar);
    }

    public function getSlider()
    {        
        $ayarlar = Sliders::all();
        return view('admin.slide')->with('ayarlar',$ayarlar);
    }

    public function getAltSlider()
    {  
        $maddeler = Maddeler::all()->first();
        $resimler = AltSlide::all();
        $veriler = ['madde' => $maddeler,'resimler' => $resimler];
        return view('admin.altslide')->with('veriler',$veriler);
    }

    public function getKategoriler()
    {
        $kategoriler = Kategori::all();
        return view('admin.kategoriler')->with('kategoriler',$kategoriler);
    }

    public function getBlog()
    {
        $kategori = Kategori::all();
        return view('admin.blogekle')->with('kategori',$kategori);
    }

    public function getBloglar()
    {
        $bloglar = Blog::paginate(10);

        return view('admin.bloglar')->with('bloglar',$bloglar);
    }

    public function cikisYap()
    {
        try
        {
            Auth::logout();
            return redirect('/login');
        }
        catch(Exception $e)
        {
            return $e;
        }
        
        
    }






}
