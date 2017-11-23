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
        	<div class="col-md-12 orderSelf profil orderSelf_titleBox" style="{{ ((Auth::user()->showAddressForOrderSelf) == 0) ? 'display:block' : 'display:none' }}">
        		<div class="panel panel-default">
    				<h2>Что необходимо для получения адреса для самостоятельных покупок в Германии? </h2>
    				<p>Чтобы иметь возможность делать покупки на виртуальный адрес, от вас требуется фото отсканированного паспорта (главная страница с фото и страница с пропиской). Так же фото кредитной карты, с которой вы планируете оплачивать свои заказы. </p>
    				<p>После проверки представленных документов  и пополнения счета(смотрите ниже), вы получите виртуальный адрес, который можно использовать для совершения покупок во многих онлайн-магазинах Германии.</p>
    				<p>Так же для использования Виртуального адреса на счету должно быть мин. 15 евро. Эту сумма не является оплатой за виртуальный адрес, а служит для списания с Вашего счёта средств  за наши услуги.</p>
				</div>
			</div>
				<div class="col-md-12 orderSelf profil orderSelf_hiddenBox" style="{{ ((Auth::user()->showAddressForOrderSelf) == 1)  ? 'display:block' : 'display:none' }}">
					<div class="panel panel-default">
        				<div class="panel-heading">Заказать товар самому</div> 
        				<div class="panel-heading panel_required"><span>*</span> Обязательные поля</div>
    					<div class="row">
    						<div class="col-md-6">
    							<div class="orderSelf_firstBlock">
	    							<form class="form-horizontal" method="post" action="{{ route('orderSelf') }}">
								 		{{ csrf_field() }}
										<div class="form-group">
											<label for="name">Название <span>*</span></label>
										<input type="text" class="form-control" name="name" required>
										</div>
										<div class="form-group">
										<label for="price">Цена в евро <span>*</span></label>
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
    						<div class="col-md-5 col-md-offset-1">
    							<div class="orderSelf_secondBlock">
    								<h3>Ваш Адрес для заказа товара самому</h3>
				        			<div class="footer_address">
				    					<p>Daniel Wagner</p>
				    					<p>Saxtorfer Weg 14 B</p>
				    					<p>24340 Eckernförde</p>
				    				</div>
		        					<b>Важно!!!</b>
		        					<p>Адрес для самостоятельных покупок можно указывать лишь в поле (Lieferanschrift) для доставки по Германии, и ни в коем случае не в (Rechnungsanschrift) поле платёжа. 
		        					</p> 
		        					<p>В случае нарушения этого условия, посылка будет возращена в магазин, а клиенту отправлено  предупреждение. Если условие будет нарушено вторично, то клиент будет оштрафован на сумму в 30 евро.
		        					</p>
		        					<p>Обратите внимание, что максимальная сумма заказа на "Адрес для самостоятельных покупок" составляет 300 €. Всё, что выше этой суммы обрабатываются как "Заказ товара с нашей помощью"</p>	
		        					<p>Без предоставления соотвествующих документов для использования Адреса для самостоятельных покупок - покупки будут возвращены продавцу.</p>
    							</div>
    						</div>
    					</div>
		            </div>
		        </div>
			</div>
		</div>
	</div>
		
@endsection