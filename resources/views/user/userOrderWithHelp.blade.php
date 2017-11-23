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
        	<div class="col-md-12 orderWithHelp profil">
        		<div class="panel panel-default">
	              <div class="panel-heading">Заказ товара с нашей помощью</div> 
	              <div class="panel-heading panel_required"><span>*</span> Обязательные поля</div>
					
				 	<form class="form-horizontal" method="post" action="{{ route('orderWithHelp') }}">
				 		{{ csrf_field() }}
					  <div class="form-group">
					  	<label for="link">Ссылка на товар <span>*</span></label>
					  	<input type="text" class="form-control" name="link" required>
					  </div>
					  <div class="form-group">
					  	<label for="name">Название <span>*</span></label>
					    <input type="text" class="form-control" name="name" required>
					  </div>
					  <div class="form-group">
					  	<label for="article">Артикул №</label>
					  	<input type="text" class="form-control" name="article">
					  </div>
					  <div class="form-group">
						<label for="price">Цена в евро + доставка по Германии <span>*</span></label>
					  	<input type="text" class="form-control" name="price" required>
					  </div>
					  <div class="form-group">
					  	<label for="value">Количество <span>*</span></label>
					  	<input type="number" class="form-control" name="value" required>
					  </div>
					  <div class="form-group">
					  	<label for="color">Цвет</label>
					  	<input type="text" class="form-control" name="color">
					  </div>
					  <div class="form-group">
					  	<label for="size">Размер</label>
					  	<input type="text" class="form-control" name="size">
					  </div>
					  <div class="form-group">
					  	<label for="comment">Комментарий</label>
					  	<textarea name="comment" class="form-control" rows="3"></textarea>
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