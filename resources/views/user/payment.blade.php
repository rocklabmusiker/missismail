@extends('user.layouts.app')

@section('links_registration')
        <li><a href="{{ route('login') }}">Войти</a></li>
        <li><a href="{{ route('register') }}">Регистрация</a></li>
@endsection

@section('userMenu')
    @include('user.layouts.userMenu')
@endsection



@section('content')
	<div class="container">
    	<div class="row">
        	<div class="col-md-12 instruction profil">
        		<div class="panel panel-default">
	            	<div class="panel-heading">Пополнить счёт</div> 
						<div class="instruction">
						<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
						
		    				<form action="{{ route('paymentSend') }} " method="POST">
							  
							  <script
							    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
							    data-key="{{ env('STRIPE_PUBLIC') }}"
							    data-amount="{{ Auth::user()->debt }}"                
							    data-name="Missismail"
							    data-description="Оплата"
							    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
							    data-locale="auto"
							    data-currency="eur"
							    data-zip-code="false"
							    data-email="{{ Auth::user()->email }}"
							    data-label="Оплата картой"
							    data-allow-remember-me="false"
							    data-panel-label="Оплатить €">

							  </script>	
							  {{ csrf_field() }}						
							</form>	
						
					</div>
	            </div>
	            <div class="panel panel-default">
	            	<div class="panel-heading">История переводов</div>
	            	<div class="instruction">
	            		@if(isset($paymentLists))
	            			@foreach($paymentLists as $paymentList)
								<p>Дата: {{ $paymentList->created_at }} Сумма: {{ $paymentList->money }}</p>
	            			@endforeach
	            		@endif
	            	</div>

	            </div>
			</div>
		</div>
	</div>
	

@endsection