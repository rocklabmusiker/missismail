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
        	<div class="col-md-12 adminEmails profil">
        		<div class="panel panel-default">
	              <div class="panel-heading">Сообщения</div> 
					<ul class="nav nav-tabs">
					  <li role="presentation" class="active"><a href="{{ route('adminEmails') }}">Полученые</a></li>
					  <li role="presentation"><a href="{{ route('userEmails') }}">Отправленые</a></li>
					 
					</ul>
					  <div class="adminEmails_tabs">
					  	 @if(isset($adminEmails))
							<ul class="adminEmails_content" id="adminEmails_content">
								@foreach($adminEmails as $adminEmail)
									<li class="adminEmails_accordion">
										<div class="adminEmails_top-botton">
											<h5>{{ date('d M. Y', strtotime($adminEmail->created_at)) }} <span>{{ $adminEmail->theme }}</span>
												<span class="adminEmailsStatus">
													@if($adminEmail->status == 'new')
														Новое сообщение
													@elseif($adminEmail->status == 'old')
														
													@endif
												</span>
											</h5>
										</div>

										<div class="adminEmails_text adminEmails_acc">
											<p><span>{{ $adminEmail->text }}</span></p>
											@if($adminEmail->status == 'new')
												<form class="form-inline" method="post" action="{{ route('adminEmailUpdate', ['adminEmail_id' => $adminEmail->id]) }}">
				                        			{{ csrf_field() }}
						 							{{ method_field('PUT') }}
													<div class="form-group">
													    <button type="submit" class="btn btn-default">Отметить как прочитаное</button>
													</div>
				                        		</form>
				                        	@elseif($adminEmail->status == 'old')
				                        		<form class="form-inline" method="post" action="{{ route('adminEmailDelete', ['adminEmail_id' => $adminEmail->id,]) }}">
			                        			{{ csrf_field() }}
					 							{{ method_field('DELETE') }}
												<div class="form-group">
												    <button type="submit" class="btn btn-default" onclick="return deleteAdminEmail();">Удалить сообщение</button>
												</div>
			                        		</form>
											@endif
										</div>
									</li>
								@endforeach
								{!! $adminEmails->render() !!}
							</ul>

					  	 @endif  
					</div>
	            </div>
			</div>
		</div>
	</div>

@endsection