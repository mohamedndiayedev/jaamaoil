@extends('layouts.customer', [
  'pageTitle' => 'Profile',
  'iconSource' => 'images/colprofile.png',
  'pageSubTitle' => 'Change Password'
  ])

@section('MainContent')
  
  <?php  $name=Session::get('customer.name'); $email =Session::get('customer.email');  Session::flash('email', $email); ?>

  <div class="container v-tableDiv">
  <form action="" method="POST">
    @csrf
  <div class="col-md-8 mb-6 profDiv">  
  <h1 class="master-h3"> Name : {{ $name }} </h1>
  </div>
  <div class="col-md-8 mb-6 profDiv">  
  <h1 class="master-h3"> Email Address : {{ $email }} </h1>
  </div>
  <div class="col-md-8 mb-6" style="padding-left:10px;"> 
  <input type="password" class="vform-field" name="password" placeholder="Enter New Password"></div>

  <div class="col-md-8 mb-6 profDiv"> 

  <button type="submit" class="btn btn-secondary vform-btn">Change Password</button></div>

  </form>
  </div>

  @section('extraScripts')

    @if(Session::has('password'))
    <div class="container flashbox">
    <div class="col-md-7 offset-3 mt-4">
    <p class="alert
    {{ Session::get('alert-class', 'alert-info') }}">{{Session::get('password') }}</p>
    </div>
    </div>
    @endif

  @endsection
@endsection