@extends('user.layouts.appVerification')

@section('content')

<div class="container" style="margin-top:100px;">

	<div class="row">

		<div class="col-md-8 col-md-offset-2">

			<div class="panel panel-default">

			<div class="panel-heading">Регистрация прошла успешна</div>

			<div class="panel-body">

			Ваша электронная почта успешно подтверждена. Нажмите <a href="{{url('/login')}}">Вход</a>

			</div>

			</div>

		</div>

	</div>

</div>

@endsection