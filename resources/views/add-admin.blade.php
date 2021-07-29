<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Registration</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css" >

</head>

<body>
    <div class="container-fluid">
    <nav class="navbar navbar-light bg-light navbar1">

<a class="nav-brand nav-link nav-link1 px-5">
  <img src="images/newlogo.jpeg" width="100" height="60" alt="logo">
</a>
<ul class="nav justify-content-center">

<li class="nav-item nav-item1">
<a class="nav-link nav-link1" href="/login">Login</a>
</li>
<!-- <li class="nav-item nav-item1">
  <a class="nav-link nav-link1" href="/reg-customer">Register</a>
</li> -->
</ul>

</nav>
</div>



<div class="container aLogDiv1">
<form action="/add-admin" method="POST">
  <h1 class="logH1">Admin Registration</h1>
  <div class="form-group aLogForm">
    @csrf

    <input type="text" class="form-control" name="name" placeholder="Admin Name"></div>
   
    <div class="form-group">
    <input type="email" class="form-control" name="email" placeholder="Email Address">
  </div>

  
  <div class="form-group">
    <input type="password" class="form-control" name="password" placeholder="Password">
  </div>
  
  <div class="form-group">
  <button type="submit" class="btn btn-secondary a-logBtn w-100">Register</button></form>
</div>
</form>
</div>

<footer>
<div class="container-fluid footerImg2"></div>   </footer>   
</body>
</html>
@if(Session::has('register'))
<div class="container flashbox">
<div class="col-md-7 offset-3 mt-4">
<p class="alert
{{ Session::get('alert-class', 'alert-info') }}">{{Session::get('register') }}</p>
</div>
</div>
@endif