@extends('admin.app')
@section('icerik')
<section class="content-header">
      <h1>
       Genel Ayarlar
        <small>Site Ayarları</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>  Genel Ayarlar </a></li>
        <li class="active">Site Ayarları</li>
      </ol>
    </section>
<div class="box-body col-lg-6">
	<form id="ayarform" enctype="multipart/form-data">
		

		<div class="form-group" >
	         <label>Site Logo</label>
	         <input type="file" id="exampleInputFile" name="site_logo" class="col-lg-6" />
	         <div class="help-block col-lg-6" style="width:150px;height:50px;"><img style="max-width:100%;max-height:100%;" src="img/{{$ayarlar->site_logo}}"/>
	    </div>

	
	  
		<div class="form-group col-lg-12" style="top:0;">
	        <label>Site Başlık</label>
	        <input type="text" class="form-control" placeholder="Site başlık" name="site_baslik" required value="{{$ayarlar->site_baslik}}">
	    </div>
	    <div class="form-group col-lg-12">
	        <label>Site Açıklaması</label>
	        <input type="text" class="form-control" placeholder="Site açıklaması" name="site_aciklama" required value="{{$ayarlar->site_aciklama}}">
	    </div>
	    <div class="form-group col-lg-12">
	        <label>Anahtar Kelimeler</label>
	        <input type="text" class="form-control" placeholder="Lütfen virgül ile ayırınız.Örn:kalem,kağıt" name="site_anahtar_kelimeler" required value="{{$ayarlar->site_anahtar_kelimeler}}">
	        <input type="submit" id="submit" value="Gönder" class="btn btn-primary submit" style="margin-top:10px;"/>
	    </div>
	    
	</form>
</div>
@section('js')
<script>
	$(document).ready(function(){
		$('#ayarform').on('submit',(function(e){
			e.preventDefault();	
			$.ajax({
				headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}"},
				url:' {{URL::to('/admin/ayarlar')}}',
				type:'POST',
				data: new FormData(this),
				dataType:'JSON',
				contentType: false,
				processData: false,
				cache:false,
				success:function(e){
					if(e.cevap == 'ok'){
						alert('Ayarlarınız kaydedildi.');
					}else if(e.cevap =='resimyok'){
						alert('Resim yükleme hatası');
					}else {
						alert(e.cevap);
					}
				}	
			});
		}));
	});
</script>
@endsection
@endsection