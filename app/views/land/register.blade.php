@extends('site.layouts.default')

{{-- Content --}}
@section('content')
<div class="container public">
  <h3>Register</h3>

  	@if ( Session::get('error') )
  	<?php 
  		$errors = Session::get('error');
  		foreach($errors as $i => $error): ?>
		<div class="alert alert-danger"><?php echo $error; ?></div>
	<?php endforeach; ?>
	@endif

  <form class="form-signin" method="post" action="{{ URL::to('doregister') }}" accept-charset="UTF-8">
  	<input type="hidden" name="_token" value="{{ csrf_token() }}">
  	<fieldset>
  		<div class="form-group">
			<input name="username" type="text" class="form-control" placeholder="Username" value="{{ Input::old('username'); }}" autofocus required></input>	
	    </div>

  		<div class="form-group">
			<input name="name" type="text" class="form-control" placeholder="Name" value="{{ Input::old('name'); }}" autofocus required></input>	
	    </div>
	    
	    <div class="form-group">
			<input type="email" name="email" class="form-control" placeholder="Email address"  value="{{ Input::old('email'); }}" autofocus required></input>	
	    </div>

	    <div class="form-group">
			<input type="password" minlength="3" name="password" class="form-control" placeholder="Password" required></input>
	    </div>

	    <div class="form-group">
			<input type="password" minlength="3" name="password_confirmation" class="form-control" placeholder="Password Confirmation" required></input>
	    </div>
	    <div class="form-group">
	    	<input name="phone_number" type="text" class="form-control" placeholder="Phone Number" value="{{ Input::old('phone_number'); }}" autofocus required></input>
	    </div>
	    
	    <div class="form-group">
		    <label for="address">Check Availability for your area</label>
			<input name="address" id="address" type="text" class="form-control" placeholder="Address or Postal Code" value="{{ Input::old('address'); }}" autofocus required></input>
		</div>

		<div id="address_result">
			
		</div>

	    <button class="btn btn-lg btn-primary btn-block" type="submit">Next</button>

	</fieldset>
  </form>

</div> <!-- /container -->