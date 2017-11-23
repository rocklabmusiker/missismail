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
        	<div class="col-md-12 myProfilEdit profil">
        		<div class="panel panel-default">
	              <div class="panel-heading">Мой профиль</div> 
					<ul class="nav nav-tabs">
					  <li role="presentation"><a href="{{ route('userMyProfile') }}">Мои данные</a></li>
					  <li role="presentation" class="active"><a href="{{ route('userMyProfileEdit') }}">Редактировать данные</a></li>
					  <li role="presentation"><a href="{{ route('userMyProfileChangePassword') }}">Изменить пароль</a></li>
					  <li role="presentation"><a href="{{ route('userMyProfileTestimonials') }}">Написать отзыв</a></li>
					</ul>
				  	 
				 	<form class="form-horizontal" method="post" action="{{ route('userMyProfileEdit') }}">
				 		{{ csrf_field() }}
				 		{{ method_field('PUT') }}
					  <div class="form-group">
					  	<label for="name">Имя</label>
					  	<input type="text" class="form-control" name="name" value="{{ Auth::user()->name}}">
					  </div>
					  <div class="form-group">
					  	<label for="lastname">Фамилия</label>
					    <input type="text" class="form-control" name="lastname" value="{{ Auth::user()->lastname}}">
					  </div>
					  <div class="form-group">
					  	<label for="street">Улица</label>
					  	<input type="text" class="form-control" name="street" value="{{ Auth::user()->street}}">
					  </div>
					  <div class="form-group">
						<label for="homeNumber">Номер дома</label>
					  	<input type="text" class="form-control" name="homeNumber" value="{{ Auth::user()->homeNumber}}">
					  </div>
					  <div class="form-group">
					  	<label for="flat">Квартира</label>
					  	<input type="number" class="form-control" name="flat" value="{{ Auth::user()->flat}}">
					  </div>
					  <div class="form-group">
					  	<label for="postcode">Индекс</label>
					  	<input type="text" class="form-control" name="postcode" value="{{ Auth::user()->postcode}}">
					  </div>
					  <div class="form-group">
					  	<label for="city">Город</label>
					  	<input type="text" class="form-control" name="city" value="{{ Auth::user()->city}}">
					  </div>
					  <div class="form-group">
					  	<label for="area">Область</label>
					  	<input type="text" class="form-control" name="area" value="{{ Auth::user()->area}}">
					  </div>
					  <div class="form-group">
					  	<label for="country">Страна</label>
					  	<input type="text" class="form-control" name="country" value="{{ Auth::user()->country}}">
					  </div>
					  <div class="form-group">
					  	<label for="phoneNumber">Телефон</label>
					  	<input type="text" class="form-control" name="phoneNumber" value="{{ Auth::user()->phoneNumber}}">
					  </div>
					  <div class="form-group">
					  	<label for="mobile">Мобильный</label>
					  	<input type="text" class="form-control" name="mobile" value="{{ Auth::user()->mobile}}">
					  </div>
					  <div class="form-group">
					      <button type="submit" class="btn btn-default">Обновить</button>
					  </div>
					</form>
	            </div>
			</div>
		</div>
	</div>

@endsection