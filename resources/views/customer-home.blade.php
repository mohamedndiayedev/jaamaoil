@extends('layouts.customer', [
  'pageTitle' => 'Redeemed Vouchers',
  'iconSource' => 'images/coldoc.png',
  'pageSubTitle' => "List of Redeemed Vouchers"
  ])


@section("MainContent")

<div class="container v-tableDiv">

<table class="table" id="table">
  <thead>
    <tr>
      <th scope="col">Serial Number</th>
      <th scope="col">Value</th>
      <th scope="col">Redeemed on</th>
      <th scope="col">Location</th>
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
      <td class="text-left">{{ 'D'.' '. $voucher->value }}</td>
      <td class="text-left">{{ $voucher->updated_at }}</td>
      <td class="text-left">{{ $voucher->location }}</td>
    </tr>
   @endforeach
  </tbody>
</table>
</div>


<script>
$(document).ready( function () {
    $('#table').DataTable();
} );

</script>

@endsection




