@if(Session::has('staff')) 
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ $pageTitle  }}</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="/css/style.css" >
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">

<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>


<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

</head>

<body>
  <div class="logoBox">
    <div class="container master-div bg-white">

  <img class="mainLogo" src="images/newlogo.jpeg"> 
    </div>
  </div>

    <div class="container master-div" style="position: relative">

        <div id="NavigationAndHeadingBox" class="row" style="padding-bottom:5px;">

        <div class="col master-div2"><h1 class="master-h1">Hi, {{ Session::get('staff.name') }}</h1></div>
<div class="master-div3">

    <nav class="navbar navbar-expand-lg navbar2">
        <ul class="nav justify-content-center">
        
        <li class="nav-item nav-item2"> 
            <a class="nav-link nav-link2 active" href="/staff-home"> 
            <img class="icons" src="images/listIcon.png" width="22" height="22">
            Vouchers</a>
        </li>  `

        <li class="nav-item nav-item2">
            <a class="nav-link nav-link2" href="/scan-me">
            <img class="icons" src="images/scan.png" width="22" height="22">
            Scan QR Code</a>
        </li>

        <li class="nav-item nav-item2">
            <a class="nav-link nav-link2" href="/profile-staff">
            <img class="icons" src="images/user.png" width="22" height="22">
            Profile</a>
        </li>

        <li class="nav-item nav-item2">
            <a class="nav-link nav-link2" href="{{ url('/logout') }}">
            <img class="icons" src="images/logout.png" width="20" height="24">
            Logout</a>
        </li>

        </ul>
    </nav>
</div> 
            @yield('MainHeading')
        
            <div class="container master-div4">
                <div class="row flex-nowrap">
                <div class="col">   
                    <img class="icon" src="{{ $iconSource }}" width="60" height="48">
                </div>
                
                <div class="col flex-1">
                    <h1 class="master-h2">{{ $pageTitle  }}</h1>
                    <h2 class="master-h3">{{ $pageSubTitle }}</h2>
                </div>
                </div><!-- .row -->
            </div><!-- container master-div4 -->
            <div class=" master-div5"></div>
        </div>

        @yield('MainContent')

    </div><!-- .container.master-div -->
  <div id="MainFooter">
    <small class="block" style="display:block; text-align: center">Copyright {{ date('Y') }} </small>
    <!-- <img src="/images/footer2.png" alt="Footer graphic" class=""> -->
  </div>   


  @if(Session::has('record'))
    <div class="container flashbox">
      <div class="col-md-7 offset-3 mt-4">
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
          {{Session::get('record') }}
        </p>
      </div><!-- col-md-7 offset-3 mt-4 -->
    </div><!-- .container.flashbox -->

    <script>
      window.location = "/download";
    </script>

    
  @endif

  @yield('extraScripts')


</body>
</html>

@else   

<script>
window.location = "/session-check";
</script>

@endif
