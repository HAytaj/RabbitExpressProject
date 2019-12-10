@extends('layout.main')
@section('title',"Checkout")

@section('content')

<h1><strong>Checkout</strong></h1>
	<h5>Total: ${{$totalPrice}}</h5>
	<form action="/cart/payment" method="post" id="payment-form">
		<label for="card-element">
			Credit or debit card
		</label>
		<div id="card-element">
			<!-- A Stripe Element will be inserted here. -->
		</div>

		<!-- Used to display Element errors. -->
		<div id="card-errors" role="alert"></div>
		{{ csrf_field() }}
		<button class="btn btn-primary my-3">Submit Payment</button>
	</form>
@endsection

	@section('scripts')
	<script src="https://js.stripe.com/v3/"></script>
	<script src="{{asset('src/js/checkout.js')}}"></script>

	@endsection