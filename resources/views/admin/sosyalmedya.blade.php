@extends('admin.app')
@section('icerik')
<section class="content-header">
      <h1>
       Sosyal Medya
        <small>Sosyal Medya Ayarları</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>  Sosyal Medya </a></li>
        <li class="active">Sosyal Medya Ayarları</li>
      </ol>
    </section>
<div class="box-body col-lg-6">
	<form id="sosyalform">
     
    	<div class="form-group">
            <label>Facebook</label>
            <input type="text" class="form-control" placeholder="Sitenizin facebook adresi" name="facebook" required="Boş olamaz" value="{{$ayarlar->facebook}}">
        </div>
        <div class="form-group">
            <label>Twitter</label>
            <input type="text" class="form-control" placeholder="Sitenizin twitter adresi" name="twitter" required="Boş olamaz" value="{{$ayarlar->twitter}}">
        </div>
        <div class="form-group">
            <label>Instagram</label>
            <input type="text" class="form-control" placeholder="Sitenizin instagram adresi "name="instagram" required="Boş olamaz" value="{{$ayarlar->instagram}}">
        </div>
        <div class="form-group">
            <label>Youtube</label>
            <input type="text" class="form-control" placeholder="Sitenizin youtube kanalı" name="youtube" required="Boş olamaz" value="{{$ayarlar->youtube}}">
        </div>

            <button  class="btn btn-primary yolla">Güncelle</button>
        
    </form>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function(){
        $('#sosyalform').on('submit',(function(e){
            e.preventDefault(); 
            $.ajax({
                headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}"},
                url:' {{URL::to('/admin/sosyalmedyaduzenle')}}',
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
    });
</script>
@endsection




