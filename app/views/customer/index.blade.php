@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('customer.profile') }}} ::
@parent
@stop
<style>
.glyphicon {
    transform:scale(2.0,2.0);
    -ms-transform:scale(2.0,2.0); /* IE 9 */
    -moz-transform:scale(2.0,2.0); /* Firefox */
    -webkit-transform:scale(2.0,2.0); /* Safari and Chrome */
    -o-transform:scale(2.0,2.0); /* Opera */
    width:30px;
    height:20px;
    margin-left:50px;
}
</style>
{{-- Content --}}
@section('content')
<h3>Welcome Back <?php echo ucfirst($current_user->name); ?></h3>
<div class="container">
    <a class="btn btn-lg btn-primary btn-block" href="#">Place Your Order</a>
    <hr>

        <span class="glyphicon glyphicon-shopping-cart"></span>
        <a href="#">My Orders</a>
        <p>2 active orders</p>

    <hr>
    <span class="glyphicon glyphicon-user"></span>
        <a href="">My Account</a>
        <p>Contact details, 2 addresses</p>
    <hr>
        <span class="glyphicon glyphicon-credit-card"></span>
        <a href="">Payment</a>
        <p>1 credit card</p>
    <hr>
        <span class="glyphicon glyphicon-usd"></span>
        <a href="">Tell a friend</a>
        <p>Sharing</p>
    <hr>
    <div class="btn-group">
        <a href="#" class="">Prices</a>
        <a href="#" class="">Help</a>
        <a href="#" class="">About Us</a>
    </div>
</div>

@stop
