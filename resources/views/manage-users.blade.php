@extends('layouts.app2', [
  'pageTitle' => 'Manage Users',
  'iconSource' => 'images/coldoc.png',
  'pageSubTitle' => 'Master Voucher List Management'
  ])


@section("MainContent")

<!-- MODAL TO REMOVE USER  -->
  <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Remove User</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <h5 class="modal-h1" id="exampleModalLabel"></h5>
      <form action="" method="POST">
       @csrf
          
       <input type="hidden" class="form-control" id="email" name="email">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Confirm</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        
      </div></form>
    </div>
  </div>
</div> <!-- modal -->


<div class="container">
  <div class="v-tableDiv">

      @if(Session::get('page')=='customers')
        <table class="table" id="table">
          <thead>
            <tr>
              <th scope="col">Customer Name</th>
              <th scope="col">Email Address</th>
              <th scope="col">Contact</th>
              <th scope="col">Address</th>
            </tr>
          </thead>
          <tbody>

          @foreach($customers as $customer)
            <tr>
              <td>{{ $customer->name }}</td>
              <td>{{ $customer->email }}</td>
              <td>{{ $customer->contact }}</td>
              <td>{{ $customer->address }}</td>
            </tr>
          @endforeach

          </tbody>
        </table>


        <!-- if admins: -->
      @elseif(Session::get('page')=='admins')
        <table class="table" id="table">
          <thead>
            <tr>
              <th scope="col">Admin Name</th>
              <th scope="col">Email Address</th>
              <th scope="col">Action</th> 

            </tr>
          </thead>
          <tbody>

          @foreach($users as $user)
            <tr>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-name=<?php echo $user->name; ?> data-email=<?php echo $user->email; ?>>Delete</button></td> 

            </tr>
          @endforeach

          </tbody>
        </table>


        <!-- if staffs: -->
      @elseif(Session::get('page')=='staffs')
        <table class="table" id="table">
          <thead>
            <tr>
              <th scope="col">Staff Name</th>
              <th scope="col">Email Address</th>
              <th scope="col">Contact</th>
              <th scope="col">Branch</th>
              <th scope="col">Action</th> 

            </tr>
          </thead>
          <tbody>

          @foreach($staffs as $staff)
            <tr>
              <td>{{ $staff->name }}</td>
              <td>{{ $staff->email }}</td>
              <td>{{ $staff->contact }}</td>
              <td>{{ $staff->branch }}</td>
              <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-name=<?php echo $staff->name; ?> data-email=<?php echo $staff->email; ?>>Delete</button></td> 

            </tr>
          @endforeach

          </tbody>
        </table>

      @endif

  </div>
</div><!-- .container -->

  @section('extraScripts')
    <!-- MODAL TO DELETE USER -->
    <script>
    $('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var email = button.data('email') // Extract info from data-* attributes
    var name = button.data('name') // Extract info from data-* attributes

    var modal = $(this)
    modal.find('.modal-h1').text('Are you sure you want to remove the user ' + name + '?')
    document.getElementById("email").value = email;
    })
    </script>

    <script>
    $(document).ready( function () {
      $('#table').DataTable();
    } );</script>

  @endsection

@endsection
