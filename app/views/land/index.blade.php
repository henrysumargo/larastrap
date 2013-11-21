@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')

@parent
@stop

{{-- Content --}}
@section('content')
<div class="container public">

  <a class="btn btn-lg btn-danger btn-block" href="/register">Create Account</a>

  <a class="btn btn-lg btn-primary btn-block facebook" href="#">Connect with Facebook</a>

  <hr></hr>

  <form class="form-signin" method="post" action="{{ URL::to('login') }}" accept-charset="UTF-8">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @if ( Session::get('error') )
    <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif

    @if ( Session::get('notice') )
    <div class="alert">{{ Session::get('notice') }}</div>
    @endif

    <fieldset>

      <div class="form-group">
        <input class="form-control" tabindex="1" placeholder="{{ Lang::get('confide::confide.username_e_mail') }}" type="text" name="email" id="email" value="{{ Input::old('email') }}">
      </div>

      <div class="form-group">
        <input class="form-control" tabindex="2" placeholder="{{ Lang::get('confide::confide.password') }}" type="password" name="password" id="password">
      </div>

      <div class="form-group">
        <div class="checkbox">
          <label for="remember">{{ Lang::get('confide::confide.login.remember') }}
            <input type="hidden" name="remember" value="0">
            <input tabindex="4" type="checkbox" name="remember" id="remember" value="1">
          </label>
        </div>
      </div>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </fieldset>

  </form>

</div> <!-- /container -->
@stop