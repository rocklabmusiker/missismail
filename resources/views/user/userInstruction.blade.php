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
	              <div class="panel-heading">Инструкции</div> 
					  <div class="instruction">
					  	  <p>Instructions</p>
					</div>
	            </div>
			</div>
		</div>
	</div>

@endsection