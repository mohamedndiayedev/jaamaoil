@extends('layouts.app', [
  'pageTitle' => 'Voucher',
  'iconSource' => 'images/colpenIcon.png',
  'pageSubTitle' => 'Create Vouchers'
  ])


@section("MainContent")


  <div class="container">
    <div class="v-tableDiv">
      
      <form action="/create-master-voucher" method="POST">
          @csrf
            <div class="col-md-8 mb-6 hello">  <span class="vform-icons"><img src="images/coupon.png" width="22" height="22"></span>
        <!-- <input type="text" class="vform-field" name="vname" placeholder="Voucher Name"></div> -->
        <select class='vform-field' name='vname'><option selected>Choose Voucher Name</option>
        <?php $names=Session::get('customerName');   ?>
        @foreach($names as $name)

        <option value="<?php echo $name; ?>">{{$name}}</option>

        @endforeach
        </select>
        </div>

            <div class="col-md-8 mb-6">  <span class="vform-icons"><img src="images/code.png" width="19" height="19"></span>
        <input type="text" class="vform-field" name="scode" placeholder="Short Code"></div>


            <div class="col-md-8 mb-6">  <span class="vform-icons"><img src="images/sum.png" width="22" height="22"></span>
        <input type="number" class="vform-field" name="total" placeholder="Total Voucher" min="1"></div>


            <div class="col-md-8 mb-6">  <span class="vform-icons"><img src="images/$.png" width="22" height="22"></span>
            <select name="value" class="vform-field">
        <option selected>Choose Voucher Value</option>
                <option value="50">D 50</option>
                <option value="100">D 100</option>
                <option value="200">D 200</option>
              </select></div>

              <div class="col-md-8 mb-6">  <span class="vform-icons"><img src="images/timer.png" width="22" height="22"></span> Voucher Expiration Date:
        <input class="vform-field date-field" name="edate" type="date"></div>
        <div class="vbtn-div">
        <button type="submit" class="btn btn-secondary vform-btn">Create Master Voucher</button></form></div>

        </div>
        </form>
      </div>
    </div><!-- .container -->


    @section('extraScripts')
      <script>
        $(document).ready( function () {
          $('#table').DataTable();
        });
      </script>
    @endsection

@endsection


