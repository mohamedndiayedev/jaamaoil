@extends('layouts.staff', [
  'pageTitle' => 'Redeemed Vouchers',
  'iconSource' => 'images/coldoc.png',
  'pageSubTitle' => "Scanner"
  ])

@section('MainContent')
<style>
#preview{
   width: 100%;
   height: 300px;
   
   /* margin:0px auto;
    position: relative;
    top: -15%;
    left: 25%; */
}


</style>

<div class="container v-tableDiv">

<div class="col">
<video id="preview"></video>
<script type="text/javascript">
    var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false });
    scanner.addListener('scan',function(content){
      //  alert(content);
        window.location.href=content;
       
    });
    Instascan.Camera.getCameras().then(function (cameras){
        if(cameras.length>0){
            scanner.start(cameras[0]);
            $('[name="options"]').on('change',function(){
                if($(this).val()==1){
                    if(cameras[0]!=""){
                        scanner.start(cameras[0]);
                    }else{
                        alert('No Front camera found!');
                    }
                }else if($(this).val()==2){
                    if(cameras[1]!=""){
                        scanner.start(cameras[1]);
                    }else{
                        alert('No Back camera found!');
                    }
                }
            });
        }else{
            console.error('No cameras found.');
            alert('No cameras found.');
        }
    }).catch(function(e){
        console.error(e);
        alert(e);
    });
</script>
</div>  <!--  col-6 -->
<div class="row">
<div class="col btn-group btn-group-toggle mb-5" data-toggle="buttons">
  <label class="btn btn-primary active">
    <input type="radio" name="options" value="1" autocomplete="off" checked> Front Camera
  </label>
  <label class="btn btn-secondary">
    <input type="radio" name="options" value="2" autocomplete="off"> Back Camera
  </label>
</div>
</div>
<div>

@if(session('voucher-validity')=="true")
  <?php 
    $voucher=session('voucherInfo'); ?>
    <div id="popup1" class="overlay">
    <div class="popup">
      <h2>The Voucher is Valid.</h2>
      <a class="close" onclick="document.getElementById('popup1').style.display='none'">&times;</a>
      <div class="content">
      Voucher Name: {{ $voucher['voucher_name'] }}
        <br />Voucher Amount: {{ $voucher['value'] }}
        <br /> Expiration Date: {{ $voucher['expiry_date'] }} 
        <br /> <div class="redeemBtn"><a href="/redeem-voucher" class="btn btn-success">Redeem Voucher </a></div>
      </div>
    </div>
  </div>

  @elseif(session('voucher-validity')=="false") 
    <div id="popup1" class="overlay">
      <div class="popup pfalse">
        <h2>Voucher is Invalid or Expired!</h2>
        <a class="close" onclick="document.getElementById('popup1').style.display='none'">&times;</a>
        <div class="content">
This voucher cannot be redeemed, it is either expired or invalid. Contact admin for more information!        </div>
      </div>
    </div>

  @endif


@if(Session::has('redeem'))
<div class="container flashbox">
<div class="col-md-7 offset-3 mt-4">
<p class="alert
{{ Session::get('alert-class', 'alert-info') }}">{{Session::get('redeem') }}</p>
</div>
</div>
@endif

@endsection