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
	              <div class="panel-heading">Все заказы с нашей помощью</div> 
					@if(isset($allHelpOrders))
						<ul class="allHelpOrder_content" id="allHelpOrder_content">
							@foreach($allHelpOrders as $allHelpOrder)
								<li class="allHelpOrder_accordion">
									<div class="allHelpOrder_top-botton">
										<h5>{{ date('d M. Y', strtotime($allHelpOrder->created_at)) }} <span>{{ $allHelpOrder->name }}</span> 
											<span class="allHelpOrder_status">
												<span>Статус заказа:</span>
												@if($allHelpOrder->status == 'new')
													новый
												@elseif($allHelpOrder->status == 'in_processing')
													утверждён
												@elseif($allHelpOrder->status == 'done')
													выполнен
												@elseif($allHelpOrder->status == 'archive')
													доставлен
												@endif
											</span>
										</h5>
									</div>

									<div class="allHelpOrder_text allHelpOrder_acc">
										<p><span>Ссылка на товар: </span>{{ $allHelpOrder->link }}</p>
										<p><span>Наименование: </span>{{ $allHelpOrder->name }}</p>
										<p><span>Артикул: </span>{{ $allHelpOrder->article }}</p>
										<p><span>Цена: </span>{{ $allHelpOrder->price }} €</p>
										<p><span>Стоимость доставки: </span>{{ $allHelpOrder->shipment }} €</p>
										<p><span>Количество: </span>{{ $allHelpOrder->value }}</p>
										<p><span>Цвет: </span>{{ $allHelpOrder->color }}</p>
										<p><span>Размер: </span>{{ $allHelpOrder->size }}</p>
										<p><span>Комментарий: </span>{{ $allHelpOrder->comment }}</p>
										@if($allHelpOrder->status == 'new' || $allHelpOrder->status == 'archive')
											<form class="form-inline" method="post" action="{{ route('OrderWithHelpDelete', ['orderHelpId' => $allHelpOrder->id]) }}">
			                        			{{ csrf_field() }}
					 							{{ method_field('DELETE') }}
												<div class="form-group">
												    <button type="submit" class="btn btn-default" onclick="return OrderWithHelpDelete();">{{ ($allHelpOrder->status == 'new') ? 'Отменить заказ' : 'Удалить заказ' }}</button>
												</div>
			                        		</form>
										@endif
									</div>
								</li>
							@endforeach
							{!! $allHelpOrders->render() !!}
						</ul>
						  
					@endif
				
	            </div>
			</div>
		</div>
	</div>

@endsection