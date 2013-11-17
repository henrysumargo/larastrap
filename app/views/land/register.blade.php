@extends('site.layouts.default')

{{-- Content --}}
@section('content')
<div class="container public">
  <h3>Register</h3>
  <form class="form-signin" method="post">
    <input type="text" class="form-control" placeholder="Email address" autofocus></input>
    <input type="password" class="form-control" placeholder="Password">
    <input name="first_name" type="text" class="form-control" placeholder="First Name" autofocus></input>
    <input name="last_name" type="text" class="form-control" placeholder="Last Name" autofocus></input>

    <input name="phone_number" type="text" class="form-control" placeholder="Phone Number" autofocus></input>
    
    <button class="btn btn-lg btn-primary btn-block" type="submit">Next</button>
  </form>

</div> <!-- /container -->