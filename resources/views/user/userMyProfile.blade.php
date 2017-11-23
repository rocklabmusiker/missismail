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
        	<div class="col-md-12 myProfil profil">
        		<div class="panel panel-default">
	              <div class="panel-heading">Мой профиль</div> 
					<ul class="nav nav-tabs">
					  <li role="presentation" class="active"><a href="{{ route('userMyProfile') }}">Мои данные</a></li>
					  <li role="presentation"><a href="{{ route('userMyProfileEdit') }}">Редактировать данные</a></li>
					  <li role="presentation"><a href="{{ route('userMyProfileChangePassword') }}">Изменить пароль</a></li>
					  <li role="presentation"><a href="{{ route('userMyProfileTestimonials') }}">Написать отзыв</a></li>
					</ul>
					  <div class="myProfil_tabs">
					  	  <table class="table table-bordered table-hover table-responsive">
					  	  	@if(isset($user))
			                    <tr>
			                    	<td style="width: 5%;">1</td>
			                        <th style="width: 45%;">Номер кабинета</th>
			                        <td style="width: 50%;">{{ $user->id }}</td>
			                    </tr>
			                    <tr>
			                    	<td style="width: 5%;">1</td>
			                        <th>Ваш логин</th>
			                        <td>{{ $user->email }}</td>
			                    </tr>
			                    <tr>
			                    	<td style="width: 5%;">2</td>
			                        <th>Имя</th>
			                        <td>{{ $user->name }}</td>
			                    </tr>
			                    <tr>
			                    	<td style="width: 5%;">3</td>
			                        <th>Фамилия</th>
			                        <td>{{ $user->lastname }}</td>
			                    </tr>
			                    <tr>
			                    	<td style="width: 5%;">4</td>
			                        <th>Улица</th>
			                        <td>{{ $user->street }}</td>
			                    </tr>
			                     <tr>
			                     	<td style="width: 5%;">5</td>
			                        <th>Номер дома</th>
			                        <td>{{ $user->homeNumber }}</td>
			                    </tr>
			                    <tr>
			                    	<td style="width: 5%;">6</td>
			                        <th>Квартира</th>
			                        <td>{{ $user->flat }}</td>
			                    </tr>
			                    <tr>
			                    	<td style="width: 5%;">7</td>
			                        <th>Индекс</th>
			                        <td>{{ $user->postcode }}</td>
			                    </tr>
			                    <tr>
			                    	<td style="width: 5%;">8</td>
			                        <th>Город</th>
			                        <td>{{ $user->city }}</td>
			                    </tr>
			                    <tr>
			                    	<td style="width: 5%;">9</td>
			                        <th>Область</th>
			                        <td>{{ $user->area }}</td>
			                    </tr>
			                     <tr>
			                     	<td style="width: 5%;">10</td>
			                        <th>Страна</th>
			                        <td>{{ $user->country }}</td>
			                    </tr>
			                    <tr>
			                    	<td style="width: 5%;">11</td>
			                        <th>Номер домашнего телефона</th>
			                        <td>{{ $user->phoneNumber }}</td>
			                    </tr>
			                    <tr>
			                    	<td style="width: 5%;">12</td>
			                        <th>Номер мобильного телефона</th>
			                        <td>{{ $user->mobile }}</td>
			                    </tr>
			                    <tr>
			                    	<td style="width: 5%;">13</td>
			                        <th>E-mail</th>
			                        <td>{{ (($user->verified) == 1) ? 'Подтверждён' : 'Не подтверждён' }}</td>
			                    </tr>
			                    <tr>
			                    	<td style="width: 5%;">14</td>
			                        <th>Дата регистрации</th>
			                        <td>{{ date('d M. Y', strtotime($user->created_at)) }}</td>
			                    </tr>
			                @endif
		                </table>
					</div>
	            </div>
			</div>
		</div>
	</div>

@endsection