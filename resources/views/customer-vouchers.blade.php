@extends('layouts.customer', [
  'pageTitle' => 'Vouchers',
  'iconSource' => 'images/coldoc.png',
  'pageSubTitle' => "List of all Vouchers"
  ])


@section("MainContent")

<div class="container">
    <div class="v-tableDiv">
      
      <table class="table" id="table">
      <thead>
        <tr>
          <th style="width: 90px;">Serial No.</th>
          <th style="width: 150px;">Voucher Name</th>
          <th>Value</th>
          <th style="width: 120px;">Expiry Date</th>
          <th style="width: 120px;">Generated on</th>
          <th>Status</th>
          <th>Download</th>

        </tr>
      </thead>
      <tbody>

        @foreach($vouchers as $voucher)

          @php

            $num = $voucher->id;
            $str_length = 10;
            $serial = substr("000000000{$num}", -$str_length);
          @endphp
 
          <tr>
            <td>{{ $serial }}</td>
            <td class="text-left">{{ $voucher->voucher_name }}</td>
            <td class="text-center">{{ 'D'.' '. $voucher->value }}</td>
            <td class="text-center">{{ $voucher->expiry_date }}</td>
            <td class="text-center">{{ date('Y-m-d', strtotime($voucher->created_at)) }}</td>
            
            @if($voucher->status == 'Valid')

            <td class="text-center"><button class="btn btn-success">{{ $voucher->status }}</button></td>

            @else  

            <td class="text-center">{{ $voucher->status }}</td>

            @endif

            <td class="text-center">
              <div onclick="location.href='/individual?id=<?php echo $voucher->id; ?>';" style="cursor: pointer;">
                <img src="images/download.png" width="20" height="20">
              </div>
            </td>
            </tr>
        @endforeach

        </tbody>
      </table>
      </div>
    </div><!-- .container -->

<script>
$(document).ready( function () {
    $('#table').DataTable();
} );

</script>

@endsection




