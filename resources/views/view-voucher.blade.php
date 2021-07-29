<!DOCTYPE html>
<html>
<head>

<title></title>
<style type="text/css">
    body
    {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
    .coupon
    {
        border: 5px solid black;
        width: 50%;
        border-radius: 15px;
        max-width: 309px;
        margin-left: 40px;
        float: left;
    }
    .container
    {
        padding: 1px 50px;
        width: 67%;
        padding-bottom: 10px;
    }
    .ref
    {
        padding: 2px;
        
    }
    .expire
    {
        color: rgb(0, 0, 0);
    }
    .qrcode{
        margin-left: -10px;
        padding-bottom:20px;
    }
    .serial{
        text-align: right;
        margin-bottom: 0px;
        font-family: helvetica;
        padding-right: 8px;
        padding-bottom: 5px;
    }
h2{
    text-align: center;    
}
.v-logo{
    padding-top: 5px;
    max-width: 100%;
    height: auto;
    display: block;
    margin-bottom: 10px;
}
</style>
</head>
<body>


@php

$num = $voucher->id;
$str_length = 10;

$serial = substr("000000000{$num}", -$str_length);

@endphp


<div class="coupon">
    <img class="v-logo" src="images\newlogo.jpeg">

    <div class="container" style="background-color: rgb(245, 250, 246);">
        <h2>GMD {{ $voucher->value }}</h2>
    
        <div class="qrcode"><img class="v-logo" src="qrcode\qrcode.svg"></div>
    </div>


    <div class="container">
    <p>{{ $voucher->voucher_name }}:
        <span class="ref">{{ $voucher->short_code }}</span>
    </p>

    <p class="expire">
        Expiry Date: {{ $voucher->expiry_date }}
    </p>
        
    </div>

    <p class="serial">{{ $serial }}</p>
</div>


</body>
</html>

