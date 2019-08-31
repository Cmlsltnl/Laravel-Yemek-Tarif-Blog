<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','Sayfalar@getIndex')->name('ev');
Route::get('/tarif/{slug}','Sayfalar@getTarif')->where('slug','^[a-zA-Z0-9-_\/]+$');
Route::get('/tarifler','Sayfalar@getTumTarifler');
Route::get('/kategoriler','Sayfalar@getTumKategoriler');
Route::get('/kategoriye-gore/{slug}/','Sayfalar@getKategoriyeGore');
Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
Route::post('/login','Auth\LoginController@login')->name('login');
Route::post('/cikis','Sayfalar@cikisYap');




Route::prefix('admin')->middleware('auth')->group(function () {
	Route::get('/','Sayfalar@getAdminIndex');
	Route::get('/iletisim','Sayfalar@getIletisim');
	Route::get('/sosyalmedya','Sayfalar@getSosyalMedya');
	Route::get('/slider','Sayfalar@getSlider');
	Route::get('/altslider','Sayfalar@getAltSlider');
	Route::get('/kategoriler','Sayfalar@getKategoriler');
	Route::get('/blog','Sayfalar@getBlog');
	Route::get('/bloglar','Sayfalar@getBloglar');


    Route::post('/ayarlar','Ayarlar@setAyarlar');
	Route::post('/iletisimguncelle','Ayarlar@setIletisim');
	Route::post('/sosyalmedyaduzenle','Ayarlar@setSosyalMedya');
	Route::post('/slideekle','Slidersm@setSlide');
	Route::post('/slidesil','Slidersm@deleteSlide');
	Route::post('/altslideekle','Slidersm@setAltSlide');
	Route::post('/altslidemadde','Slidersm@setMadde');
	Route::post('/altslidesil','Slidersm@deleteAltSlide');
	Route::post('/kategoriekle','Kategoric@setKategori');
	Route::post('/kategorisil','Kategoric@deleteKategori');
	Route::post('/blogekle','Blogc@blogEkle');
	Route::post('/blogsil','Blogc@blogSil');
	


	
});


    


Auth::routes();

