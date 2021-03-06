@extends('admin.layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 adminUserProfile_menu">
            <div class="panel panel-success">
                <div class="panel-heading">Письмо от Клиента </div>

                <div class="panel-body">
                  
                    <div class="adminUserProfileTable">
                    	@if(isset($userMail))
                    	<h5>Дата: {{ date('d M. Y', strtotime($userMail->created_at)) }}</h5>
                    	<h4>{{ $userMail->theme }}</h4>
                    	<p>{{ $userMail->text }}</p>
                    	@endif
                    </div>
                    <div class="adminUserProfileTable">
                    	<form class="form-inline" method="post" action="{{ route('adminUserProfilOrderWithHelpDeleteUserMail', ['id' => $user->id, 'id_order' => $id_order->id, 'id_mail' => $userMail->id]) }}">
	            			{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<div class="form-group">
							    <button type="submit" class="btn btn-default" onclick="return deleteMail();">Удалить это сообщение</button>
							</div>
	            		</form>
                    </div>
                </div>
                <div class="panel-heading">
                	<a href="{{ route('adminUserProfilOrderWithHelp',['id' => $user->id, 'order_id' => $id_order->id]) }}"> Вернуться назад </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



