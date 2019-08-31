@extends('admin.app')
@section('icerik')
<section class="content-header">
      <h1>
       Slider 
        <small>Slider</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>  Slider </a></li>
        <li class="active">Slider</li>
      </ol>
    </section>
<div class="box-body col-lg-6">
	<form id="slideform" enctype="multipart/form-data">
		

		<div class="form-group" >
	         <label for="exampleInputFile">Slide Resmi</label>
	         <input type="file" id="exampleInputFile" name="slider_resim" class="col-lg-6" />
	    </div>
	  
		<div class="form-group col-lg-12" style="top:0;">
	        <label>Slide Metni</label>
	        <input type="text" class="form-control" placeholder="Lütfen virgül kullanarak 3'e ayırınız.." name="slider_metin" required>
	        <p class="help-block">Örn:Bu muhteşem tarifler,yalnızca usta şef,bu sitede.</p>
	        <input type="submit" id="submit" value="Ekle" class="btn btn-primary submit" style="margin-top:10px;"/>
	    </div>
	   
	    
	</form>
</div>

          
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Slide Resmi</th>
                  <th>Slide Yazısı</th>
                  <th>İşlem</th>
       
                </tr>
                </thead>
                <tbody>
                	@foreach($ayarlar as $slide)
                <tr class="silinen">
                  <td><img style="max-width:100%;max-height:100%;" src="/img/{{$slide->slider_resim}}"</td>
                  <td>{{$slide->slider_metin}}</td>
                  <td>  <input type="button" id="{{$slide->id}}" value="Sil" class="btn btn-danger silbuton" style="margin-top:10px;"/></td>
                 
                </tr>
               @endforeach
          
              </table>
            </div>
            <!-- /.box-body -->
         
        <!-- /.col -->
  
@section('js')
<script>
	$(document).ready(function(){
		$('#slideform').on('submit',(function(e){
			e.preventDefault();	
			$.ajax({
				headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}"},
				url:' {{URL::to('/admin/slideekle')}}',
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

		$('.silbuton').click(function(){

			var id = $(this).attr('id');
			var veri = {};
			veri.id = $id;
			
			if(confirm("Silmek istediğinize emin misiniz?"))
			{
				$.ajax({
					headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}"},
					url:'{{URL::to('/admin/slidesil')}}',
					type:'POST',
					data:veri,
					success:function(e)
					{
						alert(e.durum);
						if(e.cevap == "ok")
						{
							alert('Silme işlemi başarılı');
							
						}
						else
						{
							alert('Hata oluştu');
						}
						
					}

				});
				$(this).parents('.silinen').remove();
			}
		});
	});
</script>
@endsection
@endsection