@extends('admin.layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 adminUserProfile_menu">
            <div class="panel panel-success">
                <div class="panel-heading">Собственные заказы {{ $user->name }} {{ $user->lastname }}</div>

                <div class="panel-body">
                    <div class="adminUserProfileMenu">
                        <a href="{{ route('adminHome') }}">ГЛАВНАЯ</a>
                        <a href="{{ route('adminOrderSelfNew') }}" >НОВЫЕ</a>
                        <a href="{{ route('adminOrderSelfInProcessing') }}" >В ОБРАБОТКЕ</a>
                        <a href="{{ route('adminOrderSelfDone') }}" >ОБРАБОТАНЫЕ</a>
                        <a href="{{ route('adminOrderSelfArchive') }}" >АРХИВ</a>

                    </div>
                    <div class="adminUserProfileTable">
                    	@if(isset($user))
                    		<h3>Личные данные клиента</h3>
	                    	<table class="table table-bordered table-hover table-responsive">     
		                        <tr>
		                            <th style="width: 30%;">Email</th>
		                            <td>{{ $user->email }}</td>
		                        </tr>
		                        <tr>
		                        	<th style="width: 30%;">Имя</th>
		                        	<td>{{ $user->name }}</td>
		                        </tr>
		                        <tr>
		                        	<th style="width: 30%;">Фамилия</th>
		                        	<td>{{ $user->lastname }}</td>
		                        </tr>
		                        <tr>
		                        	<th style="width: 30%;">Улица</th>
		                        	<td>{{ $user->street }}</td>
		                        </tr>
		                        <tr>
		                        	<th style="width: 30%;">Номер дома</th>
		                        	<td>{{ $user->homeNumber }}</td>
		                        </tr>
		                        <tr>
		                        	<th style="width: 30%;">Квартира</th>
		                        	<td>{{ $user->flat }}</td>
		                        </tr>
		                        <tr>
		                        	<th style="width: 30%;">Индекс</th>
		                        	<td>{{ $user->postcode }}</td>
		                        </tr>
		                        <tr>
		                        	<th style="width: 30%;">Область</th>
		                        	<td>{{ $user->area }}</td>
		                        </tr>
		                        <tr>
		                        	<th style="width: 30%;">Страна</th>
		                        	<td>{{ $user->country }}</td>
		                        </tr>
		                        <tr>
		                        	<th style="width: 30%;">Телефон</th>
		                        	<td>{{ $user->phoneNumber }}</td>
		                        </tr>
		                        <tr>
		                        	<th style="width: 30%;">Мобильный</th>
		                        	<td>{{ $user->mobile }}</td>
		                        </tr>
		                        <tr>
		                        	<th style="width: 30%;">Верифицирован</th>
		                        	<td>{{ ($user->verified == 1) ? 'Да' : 'Нет'  }}</td>
		                        </tr>
		                        <tr>
		                        	<th style="width: 30%;">Аккаунт Создан</th>
		                        	<td>{{ date('d M. Y', strtotime($user->created_at)) }}</td>
		                        </tr>
		                        <tr>
		                        	<th style="width: 30%;">Аккаунт Обновлён</th>
		                        	<td>{{ date('d M. Y', strtotime($user->updated_at)) }}</td>
		                        </tr>
	                    	</table>
	                    	@if(isset($status))
	                    		<h3>Заказ</h3>
		                    	<table class="table table-bordered table-hover table-responsive">     
			                        <tr>
			                        	<th style="width: 30%;">Наименование</th>
			                        	<td>{{ $status->name }}</td>
			                        </tr>
			                        <tr>
			                        	<th style="width: 30%;">Цена</th>
			                        	<td>{{ $status->price }} €</td>
			                        </tr>
			                        <tr>
			                        	<th style="width: 30%;">Количество</th>
			                        	<td>{{ $status->value }}</td>
			                        </tr>
			                        <tr>
			                        	<th style="width: 30%;">Цвет</th>
			                        	<td>{{ $status->color }}</td>
			                        </tr>
			                        <tr>
			                        	<th style="width: 30%;">Размер</th>
			                        	<td>{{ $status->size }}</td>
			                        </tr>
			                        <tr>
			                        	<th style="width: 30%;">Комментарий</th>
			                        	<td>{{ $status->comment }}</td>
			                        </tr>
		                    	</table>
		                    @endif
		                    <h3>Редактирование данных</h3>
	                    	<table class="table table-bordered table-hover table-responsive">     
		                        <tr>
		                        	<th style="width: 30%;">Кол-во закупок</th>
		                        	@if($sum_orders)
		                        		<td>{{ $sum_orders }}</td>
		                        	@endif
		                        	<td>
		                        		<form class="form-inline" method="post" action="{{ route('adminUserProfilOrderSelfDeleteOrder', ['id' => $user->id, 'id_order' => $id_order->id]) }}">
		                        			{{ csrf_field() }}
				 							{{ method_field('DELETE') }}
											<div class="form-group">
											    <button type="submit" class="btn btn-default" onclick="return deleteOrder();">Удалить весь заказ</button>
											</div>
		                        		</form>
		                        	</td>
		                        </tr>
		                        <tr>
		                        	<th style="width: 30%;">Денег на счету</th>
		                        	<td>{{ $user->money }} €</td>
		                        	<td>
		                        		<form class="form-inline" method="post" action="{{ route('adminUserProfilOrderSelfUpdateMoney', ['id' => $user->id, 'id_order' => $id_order->id]) }}">
		                        			{{ csrf_field() }}
				 							{{ method_field('PUT') }}
				 							<div class="form-group">
											  	<input type="text" name="money" class="form-control">
											</div>
											<div class="form-group">
											    <button type="submit" class="btn btn-default" onclick="return updateMoney();">Обновить счёт</button>
											</div>
		                        		</form>
		                        	</td>
		                        </tr>
		                        <tr>
		                        	<th style="width: 30%;">Открыть доступ на закупки самому</th>
		                        	<td>{{ ($user->showAddressForOrderSelf == 0) ? 'Доступ закрыт' : 'Доступ открыт'  }}</td>
		                        	<td>
		                        		<form class="form-inline" method="post" action="{{ route('adminUserProfilOrderSelfAccessBuySelf', ['id' => $user->id, 'id_order' => $id_order->id ]) }}">
		                        			{{ csrf_field() }}
				 							{{ method_field('PUT') }}
				 							<div class="form-group">
											  	<select class="form-control" name="showAddressForOrderSelf">
													<option>0</option>
													<option>1</option>
												</select>
											</div>
											<div class="form-group">
											    <button type="submit" class="btn btn-default" onclick="return accessBuySelf();">Открыть доступ для виртульного адреса</button>
											</div>
		                        		</form>
		                        	</td>
		                        </tr>
		                        @if($status)
			                        <tr>
			                        	<th style="width: 30%;">Статус обработки</th>
			                        	<td style="width: 30%;">{{ $status->status  }}</td>
			                        	<td>
			                        		<form class="form-inline" method="post" action="{{ route('adminUserProfilOrderSelfUpdateStatus', ['id' => $user->id, 'id_order' => $id_order->id]) }}">
			                        			{{ csrf_field() }}
					 							{{ method_field('PUT') }}
					 							<div class="form-group">
												  	<select class="form-control" name="status">
												  		<option></option>
														<option>new</option>
														<option>in_processing</option>
														<option>done</option>
														<option>archive</option>
													</select>
												</div>
												<div class="form-group">
												    <button type="submit" class="btn btn-default" onclick="return updateStatus();">Обновить</button>
												</div>
			                        		</form>
			                        	</td>
			                        </tr>
		                        @endif 
	                    	</table>
                    	@endif
                    </div>
                    <div class="adminUserProfileTable">
                    	<h3>Заметки по заказу</h3>
                    	<table class="table table-bordered table-hover table-responsive">
                    		<tr>
	                        	<td style="width:50%;">
	                        		<form class="form-horizontal memo_form" method="post" action="{{ route('adminUserProfilOrderSelfMemo', ['id' => $user->id, 'id_order' => $id_order->id]) }}">
	                        			{{ csrf_field() }}
			 							{{ method_field('PUT') }}
			 							<div class="form-group">
										  	<textarea name="text" class="form-control"></textarea>
										</div>
										<div class="form-group">
										    <button type="submit" class="btn btn-default" onclick="return updateMemo();">Внести заметку</button>
										</div>
	                        		</form>
	                        	</td>
	                        	<td>
	                        		@if(isset($memo))
		                        		<p>{{ $memo->text }}</p>	
	                        		@endif
	                        		<form class="form-inline" method="post" action="{{ route('adminUserProfilOrderSelfDeleteMemo', ['id' => $user->id, 'id_order' => $id_order->id]) }}">
	                        			{{ csrf_field() }}
			 							{{ method_field('DELETE') }}
										<div class="form-group">
										    <button type="submit" class="btn btn-default" onclick="return deleteMemo();">Удалить заметку</button>
										</div>
	                        		</form>
	                        	</td>
	                        </tr>
                    	</table>
                    </div>
                    @if(isset($user))
	                    <div class="adminUserProfileTable"> 
	                    	<h3>Сообщения клиенту</h3>
							<form action="{{ route('adminUserProfilOrderSelfEmail', ['id' => $user->id, 'id_order' => $id_order->id]) }}" class="adminUserProfileForm" method="post" enctype="multipart/form-data">
								{{ csrf_field() }}
								<div class="form-group">
									<label for="theme">Тема сообщения</label>
									<input type="text" name="theme" class="form-control" value="Cтатус вашего заказа на missismail.com">
								</div>
								<div class="form-group">
									<label for="email">Email Адрес</label>
									<input type="email" name="email" class="form-control" value="{{ $user->email}}">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Сообщение</label>
									<textarea class="form-control" name="text" id="editorSelf" rows="3"></textarea>
								</div>
								<div class="form-group">
									<label for="file">Закрузить файл</label>
									<input type="file" name="file" class="filestyle" id="attachedFile" data-btnClass="btn-default" data-placeholder="Файл отсутствует"  data-text="Загрузить файл">
								</div>
								<button type="submit" class="btn btn-default">Отправить</button>
							</form>
	                    </div>
	                    
                    @endif
                    <div class="adminUserProfileTable">
                    	<h3>Список шаблонов для писем</h3>
                    	<ul class="adminUserProfile_content" id="adminUserProfile_content">
							<li class="adminUserProfile_accordion">
								<div class="adminUserProfile_top-botton">
									<h4>Тема сообщения</h4>
									<p>Ваш заказ принят на обработку!</p>
								</div>
								<div class="adminUserProfile_text adminUserProfile_acc">
									<h4>Сообщение</h4>
									<p>Здравствуйте {{ $user->name}} {{ $user->lastname }}, ваш заказ принят и отправлен на обработку. Мы свяжимся с вами в ближайщее время.</p> 
									<p>С уважением, команда MissisMail.</p>
								</div>
							</li>
							<li class="adminUserProfile_accordion">
								<div class="adminUserProfile_top-botton">
									<h4>Тема сообщения</h4>
									<p>Товар прибыл на склад</p>
								</div>
								<div class="adminUserProfile_text adminUserProfile_acc">
									<h4>Сообщение</h4>
									<p>Здравствуйте {{ $user->name}} {{ $user->lastname }}, ваш товар прибыл на склад. Пожалуйста оплатите выставленый счёт.</p>
									<p> После оплаты счёта, посылка будет передана на почтовое отделение, для доставки на ваш адрес.</p>
									<p>С уважением, команда MissisMail.</p>
								</div>
							</li>	
						</ul>
                    </div>
                    <div class="adminUserProfileTable">
                    	<h3>Список сообщений</h3>
                    	<div class="adminUserMailTitle">
                    		<h4>Письма от Missismail</h4>
                    		<h4>Письма от Клиента</h4>
                    	</div>
                    	<div class="adminUserMailFlex">
                    		@if(isset($adminMails))
	                    		<ul class="adminMailsBox">
	                    			@foreach($adminMails as $adminMail)
	                					<li class="adminUserMailBox">
											<div class="adminMails_top-botton">
												<span>{{ date('d M. Y H:i', strtotime($adminMail->created_at)) }}</span>
												<a href="{{ route('adminUserProfilOrderSelfShowAdminMail', ['id' => $user->id, 'id_order' => $id_order->id, 'id_mail' => $adminMail->id]) }}">
													<h5>{{  $adminMail->theme }}</h5>
												</a>
											</div>
										</li>	
									@endforeach
	                    		</ul>
                    		@endif
                			@if(isset($userMails))
	                    		<ul class="userMailsBox">
	                    			@foreach($userMails as $userMail)
	                					<li class="userUserMailBox">
											<div class="userMails_top-botton">
												<span>{{ date('d M. Y H:i', strtotime($userMail->created_at)) }}</span>
												<a href="{{ route('adminUserProfilOrderSelfShowUserMail', ['id' => $user->id, 'id_order' => $id_order->id, 'id_mail' => $userMail->id]) }}">
													<h5>{{  $userMail->theme }}</h5>
												</a>
											</div>
										</li>	
									@endforeach
	                    		</ul>
                    		@endif
                    	</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



