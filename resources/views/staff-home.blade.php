@extends('layouts.staff', [
  'pageTitle' => 'Redeemed Vouchers',
  'iconSource' => 'images/coldoc.png',
  'pageSubTitle' => "List of Redeemed Vouchers for " . Session::get('location')
  ])


@section("MainContent")

<div class="container v-tableDiv">

<table class="table">
  <thead>
    <tr>
      <th scope="col">Serial Number</th>
      <th scope="col">Voucher Name</th>
      <th scope="col">Value</th>
      <th scope="col">Expiry Date</th>
      <th scope="col">Redeemed on</th>
      <th scope="col">Staff</th>
    </tr>
  </thead>
  <tbody>
  @foreach($vouchers as $voucher)
 <?php
$num = $voucher->id;
$str_length = 10;

$serial = substr("000000000{$num}", -$str_length);

?>
 
    <tr>
    <td>{{ $serial }}</td>
      <td class="text-left">{{ $voucher->voucher_name }}</td>
      <td class="text-left">{{ 'D'.' '. $voucher->value }}</td>
      <td class="text-left">{{ $voucher->expiry_date }}</td>
      <td class="text-left">{{ $voucher->updated_at }}</td>
      <td class="text-left">{{ $voucher->staff }}</td>
    </tr>
   @endforeach
  </tbody>
</table>
</div>

</div>
</div>
</div>



@if(Session::has('redeem'))
<div class="container flashbox">
<div class="col-md-7 offset-3 mt-4">
<p class="alert
{{ Session::get('alert-class', 'alert-info') }}">{{Session::get('redeem') }}</p>
</div>
</div>
@endif
@endsection