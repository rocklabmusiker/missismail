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
        	<div class="col-md-12 userEmails profil">
        		<div class="panel panel-default">
	              <div class="panel-heading">Сообщения</div> 
					<ul class="nav nav-tabs">
					  <li role="presentation"><a href="{{ route('adminEmails') }}">Полученые</a></li>
					  <li role="presentation" class="active"><a href="{{ route('userEmails') }}">Отправленые</a></li>
					 
					</ul>
					  <div class="adminEmails_tabs">
					  	 @if(isset($userEmails))
							<ul class="userEmails_content" id="userEmails_content">
								@foreach($userEmails as $userEmail)
									<li class="userEmails_accordion">
										<div class="userEmails_top-botton">
											<h5>{{ date('d M. Y', strtotime($userEmail->created_at)) }} <span>{{ $userEmail->theme }}</span>
											</h5>
										</div>

										<div class="userEmails_text userEmails_acc">
											<p><span>{{ $userEmail->text }}</span></p>
				                        	<form class="form-inline" method="post" action="{{ route('userEmailDelete', ['userEmail_id' => $userEmail->id]) }}">
			                        			{{ csrf_field() }}
					 							{{ method_field('DELETE') }}
												<div class="form-group">
												    <button type="submit" class="btn btn-default" onclick="return deleteAdminEmail();">Удалить сообщение</button>
												</div>
			                        		</form>
										</div>
									</li>
								@endforeach
								{!! $userEmails->render() !!}
							</ul>

					  	 @endif  
					</div>
	            </div>
			</div>
		</div>
	</div>

@endsection