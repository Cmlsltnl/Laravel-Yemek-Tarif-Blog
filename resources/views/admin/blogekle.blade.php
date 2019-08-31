@extends('admin.app')
@section('icerik')
<section class="content-header">
      <h1>
       Blog 
        <small>Blog Ekle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>  Blog </a></li>
        <li class="active">Blog Ekle</li>
      </ol>
    </section>
<div class="box-body col-lg-12">
	<form id="blogform" method="post" enctype="multipart/form-data">
		<div class="form-group">
	         <label for="exampleInputFile">Blog Resmi</label>
	         <input type="file" id="exampleInputFile" name="resim">
	         <p class="help-block">500 x 430 boyutlarında önerilir.</p>
	    </div>
	    <div class="form-group">
	        <label>Kategori</label>
	        <select class="form-control" placeholder="Site başlık" name="kategori" >
	        	@foreach($kategori as $k)
	        	<option  value="{{$k->id}}">{{$k->kategori_adi}}</option>
	        	@endforeach
	        </select>
	    </div>
		<div class="form-group">
	        <label>Blog Başlık</label>
	        <input type="text" class="form-control" placeholder="Blog başlık"  name="baslik">
	    </div>
	    <div class="form-group">
	        <label>Malzemeler</label>
	        <input type="text" class="form-control" placeholder="Lütfen virgül ile ayırınız"  name="malzemeler">
	    </div>
	    <div class="form-group">
	        <label>Hazırlanma Süresi</label>
	        <input type="text" class="form-control" placeholder="Dakika cinsinden"  name="hazirlanma">
	    </div>
	    <div class="form-group">
	        <label>Pişirme Süresi</label>
	        <input type="text" class="form-control" placeholder="Etiketler.."  name="pisirme">
	    </div>
	    <div class="form-group">
	        <label>Porsiyon</label>
	        <input type="text" class="form-control" placeholder="Kaç kişilik"  name="porsiyon">
	    </div>
	    <div class="form-group">
	        <label>Blog İçerik</label>
	        <textarea class="form-control" placeholder="Blog yazınız" id="editor"  name="icerik"></textarea> 
	      
	    </div>
	    <div class="form-group">
	        <label>Etiketler</label>
	        <input type="text" class="form-control" placeholder="Etiketler.."  name="etiket">
	    </div>
	    
	    <button type="submit" class="btn btn-primary">Ekle</button>
	</form>
</div>

@endsection
@section('js')
	<script>
		$(document).ready(function(){
			 CKEDITOR.replace( 'icerik' );
			$('#blogform').on('submit',function(e){
				CKEDITOR.instances['editor'].updateElement();
					
				
				e.preventDefault();	
				$.ajax({
					
					headers:{ 'X-CSRF-TOKEN' : "{{csrf_token()}}"},
					url:'{{URL::to('/admin/blogekle')}}',
					type:'POST',
					data:new FormData(this),
					dataType:'JSON',
					processData: false,
    				contentType: false,
					success:function(e)
					{
						if(e.cevap == "ok")
						{
							alert("Blog başarıyla eklendi");
							$('#blogform').find('input:file,input:text,textarea').val('');
							CKEDITOR.instances.editor.setData('');
							

						}
						else
						{
							alert(e.cevap);
						}
					}
				});
			});
		});
	</script>




@endsection