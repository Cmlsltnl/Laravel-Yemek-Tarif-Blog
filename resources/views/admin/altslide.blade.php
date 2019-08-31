@extends('admin.app')
@section('icerik')
<section class="content-header">
      <h1>
       Slider
        <small>Mini Slider</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Slider</a></li>
        <li class="active">Mini Slider</li>
      </ol>
    </section>
<div class="box-body col-lg-6">
	<form id="slideresimform" enctype="multipart/form-data">
		

		<div class="form-group" >
	         <label for="exampleInputFile">Slide Resmi</label>
	         <input type="file" id="exampleInputFile" name="altslide_resim" class="col-lg-6" />
	         <input type="submit" id="submit" value="Ekle" class="btn btn-primary submit" style="margin-top:10px;"/>
	    </div>
	</form>
	<form id="maddeform" enctype="multipart/form-data">  
		<div class="form-group col-lg-12" style="top:0;">
			<label>Başlık </label>
	        <input type="text" class="form-control" placeholder="" name="madde_bir" required value="{{$veriler['madde']->baslik}}">
	        <label>Madde 1 </label>
	        <input type="text" class="form-control" placeholder="" name="madde_bir" required value="{{$veriler['madde']->madde_bir}}">
	        <label>Madde 2 </label>
	        <input type="text" class="form-control" placeholder="" name="madde_iki"" required value="{{$veriler['madde']->madde_iki}}">
	        <label>Madde 3 </label>
	        <input type="text" class="form-control" placeholder="" name="madde_uc"" required value="{{$veriler['madde']->madde_uc}}">
	        <label>Madde 4 </label>
	        <input type="text" class="form-control" placeholder="" name="madde_dort"" required value="{{$veriler['madde']->madde_dort}}">
	        <label>Madde 5 </label>
	        <input type="text" class="form-control" placeholder="" name="madde_bes"" required value="{{$veriler['madde']->madde_bes}}">
	   
	        <input type="submit" id="submit" value="Güncelle" class="btn btn-primary submit" style="margin-top:10px;"/>
	    </div>
	   
	    
	</form>
</div>

          
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Slide Resmi</th>
                  <th>İşlem</th>
       
                </tr>
                </thead>
                <tbody>
                	@foreach($veriler['resimler'] as $slide)
                <tr class="silinen">
                  <td><img style="max-width:100%;max-height:100%;" src="/img/{{$slide->altslide_resim}}"</td>
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
		$('#slideresimform').on('submit',(function(e){
			e.preventDefault();	
			$.ajax({
				headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}"},
				url:' {{URL::to('/admin/altslideekle')}}',
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

		$('#maddeform').on('submit',(function(e){
			e.preventDefault();	
			$.ajax({
				headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}"},
				url:' {{URL::to('/admin/altslidemadde')}}',
				type:'POST',
				data: new FormData(this),
				dataType:'JSON',
				contentType: false,
				processData: false,
				cache:false,
				success:function(e){
					if(e.cevap){
						alert('Ayarlarınız kaydedildi.');
					}
					else {
						alert(e);
					}
				}	
			});
		}));

		$('.silbuton').click(function(){

			var $id = $(this).attr('id');
			var $veri = {};
			$veri.id = $id;
			
			if(confirm("Silmek istediğinize emin misiniz?"))
			{
				$.ajax({
					headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}"},
					url:'{{URL::to('/admin/altslidesil')}}',
					type:'POST',
					data:$veri,
					success:function(e)
					{
					
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
		})
	});
</script>
@endsection
@endsection