@extends('site.layouts.default')

{{-- Content --}}
@section('content')
<div class="container public">

  <a class="btn btn-lg btn-danger btn-block" href="/register">Create Account</a>

  <a class="btn btn-lg btn-primary btn-block facebook" href="#">Connect with Facebook</a>

  <hr></hr>

  <form class="form-signin" method="post">
    <input type="text" class="form-control" placeholder="Email address" autofocus></input>
    <input type="password" class="form-control" placeholder="Password">
    <label class="checkbox">
      <input type="checkbox" value="remember-me"> Remember me
    </label>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  </form>

</div> <!-- /container -->