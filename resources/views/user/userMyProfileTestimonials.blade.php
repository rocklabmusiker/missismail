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
        	<div class="col-md-12 myProfileTestimonials profil">
        		<div class="panel panel-default">
	              <div class="panel-heading">Написать отзыв</div> 
					<ul class="nav nav-tabs">
					  <li role="presentation"><a href="{{ route('userMyProfile') }}">Мои данные</a></li>
					  <li role="presentation"><a href="{{ route('userMyProfileEdit') }}">Редактировать данные</a></li>
					  <li role="presentation"><a href="{{ route('userMyProfileChangePassword') }}">Изменить пароль</a></li>
					  <li role="presentation" class="active"><a href="{{ route('userMyProfileTestimonials') }}">Написать отзыв</a></li>
					</ul>
				  	 
				 	<form class="form-horizontal" method="post" action="{{ route('userMyProfileTestimonials') }}">
				 		{{ csrf_field() }}
					  <div class="form-group">
					  	<label for="name">Имя</label>
					  	<input type="text" class="form-control" name="name" value="{{ Auth::user()->name}} {{ Auth::user()->lastname}}">
					  </div>
					  <div class="form-group">
					  	<label for="lastname">Отзыв</label>
					  	<textarea type="text" name="text" class="form-control"></textarea>
					  </div>
					  <div class="form-group">
					      <button type="submit" class="btn btn-default">Отправить</button>
					  </div>
					</form>
	            </div>
			</div>
		</div>
	</div>

@endsection