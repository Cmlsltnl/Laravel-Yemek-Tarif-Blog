@extends('admin.app')
@section('icerik')
<section class="content-header">
      <h1>
       İletişim
        <small>İletişim Ayarları</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>  İletişim </a></li>
        <li class="active">İletişim Ayarları</li>
      </ol>
    </section>
<div class="box-body col-lg-6">
    <form id="iletisimform">

  {{csrf_field()}}
    	<div class="form-group">
            <label>Adres</label>
            <input type="text" class="form-control" placeholder="Adres" name="adres" required max-lenght="250" value="{{$ayarlar->adres}}">
        </div>
        <div class="form-group">
            <label>Telefon:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                    </div>
                    <input type="number" class="form-control" name="telefon" required="Boş olamaz" max-lenght="11" value="{{$ayarlar->telefon}}">
                </div>
        </div>
        <div class="form-group">
            <label>E-Posta</label>
            <input type="email" class="form-control" placeholder="E-Posta adresi" name="eposta" required="Boş olamaz" max-lenght="250" value="{{$ayarlar->eposta}}">
        </div>
        <button class="btn btn-primary yolla" id="yolla2">Güncelle</button>
    </form>
</div>

@endsection

@section('js')
<!-- Page script -->

<script>
  $(document).ready(function(){
    $('#iletisimform').on('submit',(function(e){
      e.preventDefault(); 
      $.ajax({
        headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        url:' {{URL::to('/admin/iletisimguncelle')}}',
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