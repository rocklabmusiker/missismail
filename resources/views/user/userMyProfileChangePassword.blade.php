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
        	<div class="col-md-12 myProfilChangePassword profil">
        		<div class="panel panel-default">
	              <div class="panel-heading">Изменить пароль</div> 
					<ul class="nav nav-tabs">
					  <li role="presentation"><a href="{{ route('userMyProfile') }}">Мои данные</a></li>
					  <li role="presentation"><a href="{{ route('userMyProfileEdit') }}">Редактировать данные</a></li>
					  <li role="presentation" class="active"><a href="{{ route('userMyProfileChangePassword') }}">Изменить пароль</a></li>
					  <li role="presentation"><a href="{{ route('userMyProfileTestimonials') }}">Написать отзыв</a></li>
					</ul>
				  	 
					 	
		            <div class="panel-body">
		                <form class="form-horizontal" method="POST" action="{{ route('userMyProfileChangePassword') }}">
		                    {{ csrf_field() }}
							
							<div class="form-group{{ $errors->has('passwordOld') ? ' has-error' : '' }}">
		                        <label for="password" class="col-md-4 control-label">Старый Пароль</label>

		                        <div class="col-md-6">
		                            <input id="password" type="password" class="form-control" name="passwordOld" required>

		                            @if ($errors->has('passwordOld'))
		                                <span class="help-block">
		                                    <strong>{{ $errors->first('passwordOld') }}</strong>
		                                </span>
		                            @endif
		                        </div>
		                    </div>
		                   
		                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
		                        <label for="password" class="col-md-4 control-label">Новый Пароль</label>

		                        <div class="col-md-6">
		                            <input id="password" type="password" class="form-control" name="password" required>

		                            @if ($errors->has('password'))
		                                <span class="help-block">
		                                    <strong>{{ $errors->first('password') }}</strong>
		                                </span>
		                            @endif
		                        </div>
		                    </div>

		                    <div class="form-group">
		                        <label for="password-confirm" class="col-md-4 control-label">Подтверждение пароля</label>

		                        <div class="col-md-6">
		                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
		                        </div>
		                    </div>

		                    <div class="form-group">
		                        <div class="col-md-6 col-md-offset-4">
		                            <button type="submit" class="btn btn-default">
		                                Изменить пароль
		                            </button>
		                        </div>
		                    </div>
		                </form>
		            </div>
	            </div>
			</div>
		</div>
	</div>

@endsection