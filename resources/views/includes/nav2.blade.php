<div class="master-div2">
<div class="col">
  <h1 class="master-h1">Hi, {{ Session::get('admin.name') }}</h1>
</div>

</div>


<div class="master-div3">
  <nav class="navbar navbar2">
    <ul class="nav justify-content-center">

      <li class="nav-item nav-item2">
        <a class="nav-link nav-link2" href="{{ url('/create-master-voucher') }}">
          <img class="icons" src="images/penIcon.png" width="18" height="22">
        Voucher Generator</a>
      </li>

      <li class="nav-item nav-item2">
        <a class="nav-link nav-link2" href="{{ url('/vouchers-list?user=admin') }}">
      <img class="icons" src="images/vouchersIcon.png" width="18" height="20">
        Vouchers List</a>
      </li>

      <li class="nav-item nav-item2">
        <a class="nav-link nav-link2" href="{{ url('/manage-customers') }}"><img class="icons" src="images/group.png" width="24" height="29">
        Manage Users</a>
      </li>

      <li class="nav-item nav-item2">
        <a class="nav-link nav-link2" href="/profile"><img class="icons" src="images/user.png" width="22" height="22">Profile</a>
      </li>
      
      <li class="nav-item nav-item2">
        <a class="nav-link nav-link2" href="{{ url('/logout') }}"><img class="icons" src="images/logout.png" width="20" height="24">
        Logout</a>
      </li>
    </ul>
  </nav>
</div>  <!-- master-dev3 -->