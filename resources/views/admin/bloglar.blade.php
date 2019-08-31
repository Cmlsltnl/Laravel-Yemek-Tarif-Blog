@extends('admin.app')
@section('icerik')
<section class="content-header">
      <h1>
       Blog 
        <small>Blog Sil</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>  Blog </a></li>
        <li class="active">Blog Sil</li>
      </ol>
    </section>
<div class="box-body col-lg-12">
	<form id="silblogform" enctype="multipart/form-data">
		

		<div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Blog Başlık</th>
                  <th>Hit</th>
                  <th>İçerik</th> 
                     
                </tr>
                </thead>
        
                    @foreach($bloglar as $blog)
                    
                <tr class="silinen">
                    
                        <td>{{$blog->baslik}}</td>
                        <td>{{$blog->hit}}</td>
                        <td>{!!substr($blog->icerik,0, 250)!!}</td>
                        <td>  <input type="button" id="{{$blog->id}}" value="Sil" class="btn btn-danger silbuton"/></td>
                </tr>
                   
                  
             
               @endforeach
          		{{$bloglar->links()}}
              </table>
              
            </div>
	</form>
</div>
@section('js')
<script>
	$(document).ready(function(){
		 $('.silbuton').click(function(){
           var $id = $(this).attr('id');
           var $veriler = {};
            $veriler.id = $id;
            if(confirm("Silmek istediğinize emin misiniz?"))
            {
                        $.ajax({
                        headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}"},
                        url:'{{URL::to('/admin/blogsil')}}',
                        type:'POST',
                        data:$veriler,
                        success:function(e){
                            if(e.cevap)
                            {
                                alert('Silme işlemi başarılı');
                            }
                            else
                            {
                                alert('Bir hata oluştu');
                                return;
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