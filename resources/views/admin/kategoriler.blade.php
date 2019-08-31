@extends('admin.app')
@section('icerik')
<section class="content-header">
      <h1>
       Kategori
        <small>Kategori</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>  Kategori </a></li>
        <li class="active">Kategori</li>
      </ol>
    </section>
<div class="box-body col-lg-6">
	<form id="kategoriform">
        

            
        <div class="form-group">
            <label>Kategori Adı</label>
            <input type="text" class="form-control" placeholder="Kategori adı" name="kategori_adi" required >
        </div>

            <button  class="btn btn-primary yolla">Güncelle</button>
        
    </form>

    <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Kategori İsmi</th>
                  <th>İşlem</th>    
                </tr>
                </thead>
        
                    @foreach($kategoriler as $kategori)
                    @if($kategori->kategori_adi != "İnceleme")
                <tr class="silinen">
                    
                        <td>{{$kategori->kategori_adi}}</td>
                        <td>  <input type="button" id="{{$kategori->id}}" value="Sil" class="btn btn-danger silbuton"/></td>
                </tr>
                    @else
                    <tr class="silinen">
                        <td>{{$kategori->kategori_adi}}</td>
                        <td>  <input type="button" id="{{$kategori->id}}" value="Sil" class="btn btn-danger silbuton disabled"/></td>
                  
                 
                </tr>
                @endif
               @endforeach
          
              </table>
            </div>
</div>

@endsection

@section('js')
<script>
    $(document).ready(function(){
        $('#kategoriform').on('submit',(function(e){
            e.preventDefault(); 
            $.ajax({
                headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}"},
                url:' {{URL::to('/admin/kategoriekle')}}',
                type:'POST',
                data: new FormData(this),
                dataType:'JSON',
                contentType: false,
                processData: false,
                cache:false,
                success:function(e){
                    if(e.cevap == 'ok'){
                        alert('Ayarlarınız kaydedildi.');
                    }else {
                        alert(e.cevap);
                    }
                }   
            });
        }));



        $('.silbuton').click(function(){
           var $id = $(this).attr('id');
           var $veriler = {};
            $veriler.id = $id;
            if(confirm("Silmek istediğinize emin misiniz?"))
            {
                        $.ajax({
                        headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}"},
                        url:'{{URL::to('/admin/kategorisil')}}',
                        type:'POST',
                        data:$veriler,
                        success:function(e){
                            if(e.cevap == 'ok')
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