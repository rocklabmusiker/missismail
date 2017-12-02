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
        	<div class="col-md-12 orderSelf profil">
        		<div class="panel panel-default">
	              <div class="panel-heading">Все заказы с нашей помощью</div> 
					@if(isset($allSelfOrders))
						<ul class="allSelfOrder_content" id="allSelfOrder_content">
							@foreach($allSelfOrders as $allSelfOrder)
								<li class="allSelfOrder_accordion">
									<div class="allSelfOrder_top-botton">
										<h5>{{ date('d M. Y', strtotime($allSelfOrder->created_at)) }} <span>{{ $allSelfOrder->name }}</span> 
											<span class="allSelfOrder_status">
												<span>Статус заказа:</span>
												@if($allSelfOrder->status == 'new')
													новый
												@elseif($allSelfOrder->status == 'in_processing')
													утверждён
												@elseif($allSelfOrder->status == 'done')
													выполнен
												@elseif($allSelfOrder->status == 'archive')
													доставлен
												@endif
											</span>
										</h5>
									</div>

									<div class="allSelfOrder_text allSelfOrder_acc">
										<p><span>Наименование: </span>{{ $allSelfOrder->name }}</p>
										<p><span>Цена: </span>{{ $allSelfOrder->price }} €</p>
										<p><span>Количество: </span>{{ $allSelfOrder->value }}</p>
										<p><span>Цвет: </span>{{ $allSelfOrder->color }}</p>
										<p><span>Размер: </span>{{ $allSelfOrder->size }}</p>
										<p><span>Комментарий: </span>{{ $allSelfOrder->comment }}</p>
										@if($allSelfOrder->status == 'new' || $allSelfOrder->status == 'archive')
											<form class="form-inline" method="post" action="{{ route('OrderSelfDelete', ['orderSelfId' => $allSelfOrder->id]) }}">
			                        			{{ csrf_field() }}
					 							{{ method_field('DELETE') }}
												<div class="form-group">
												    <button type="submit" class="btn btn-default" onclick="return OrderSelfDelete();">{{ ($allSelfOrder->status == 'new') ? 'Отменить заказ' : 'Удалить заказ' }}</button>
												</div>
			                        		</form>
										@endif
									</div>
								</li>
							@endforeach
							{!! $allSelfOrders->render() !!}
						</ul>
						  
					@endif
				
	            </div>
			</div>
		</div>
	</div>

@endsection