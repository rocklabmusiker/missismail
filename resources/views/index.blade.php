@extends('layouts.main_scripts')

@section('header')
	@include('layouts.header')
@endsection 

@section('content')
	    <!-- SLIDER -->
    <div class="container-fluid slider">
    	<div class="row content_wrapper">
    		<div class="col-md-12 slider_content">
    			<h1>ПОКУПАЙ В ГЕРМАНИИ <span>и в других</span> СТРАНАХ ЕВРОПЫ</h1>
    			<h2>Доставка товаров из Германии в Казахстан и страны СНГ</h2>
    			<p>Зарегистрируйся и получи <span>скидку 50%</span> на наши услуги</p>
    			<div class="slider_form">
    				<form action="{{ route('emailHeader') }}" method="POST" class="slider_input" id="EmailHeader">
                        {{ csrf_field() }}
    					<input type="text" name="inputEmailHeader" placeholder="Ваш E-mail" required>
    					<div class="slider_button">
    						<input type="submit" value="зарегистрироваться">
    						<span></span>
    					</div>
    				</form>
    				<p class="slider_checkbox">Я принимаю условия <a href="{{ route('rules') }}"> Соглашения</a></p>
    			</div>
    		</div>
    	</div>
    </div>
    <!-- PROFIT -->
    <div class="container-fluid profit">
    	<div class="row content_wrapper">
    		<div class="col-md-12 profit_content">
    			<h3>Почему сотрудничать с нами <span>ВЫГОДНО</span></h3>
    			<div class="profit_list">
    				<div class="profit_item">
    					<div class="profit_icon-time"></div>
    					<h4>Мы на связи</h4>
    					<p>Вы можете связаться с нами в любое удобное для вас время</p>
    				</div>
    				<div class="profit_item">
    					<div class="profit_icon-infinite"></div>
    					<h4>Без ограничений</h4>
    					<p>У нас нет ограничений по минимальной сумме заказа</p>
    				</div>
    				<div class="profit_item">
    					<div class="profit_icon-mail"></div>
    					<h4>Уведомление</h4>
    					<p>Мы обработаем ваш заказ и вышлем уведомление в течение 1-2 часов </p>
    				</div>
    				<div class="profit_item">
    					<div class="profit_icon-send"></div>
    					<h4>Отправление</h4>
    					<p>После получения и проверки вашего заказа, мы отправляем его в тот же день</p>
    				</div>
    				<div class="profit_item">
    					<div class="profit_icon-gift"></div>
    					<h4>Бонус</h4>
    					<p>0 € за наши услуги, при каждом 5, 10, 15 … Заказе</p>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    
    <!-- MISSISMAIL -->
    <div class="container-fluid missismail">
    	<div class="row content_wrapper">
    		<div class="missismail_content">
    			<h3>MISSIS MAIL <span>это...</span></h3>
    			<p><span class="missismail_offer"></span>Новая фирма, предлагающая возможность каждому клиенту приобретать желающую покупку за границей.</p>
    			<p><span class="missismail_company"></span>Наша фирма находится в Германии, город Eckernförde.</p>
    			<p><span class="missismail_language"></span>Мы разговариваем на русском, немецком и английском языках, что позволяет нам общаться с продавцами из разных стран.</p>
    			<p><span class="missismail_protection"></span>Наша задача состоит в том, чтобы каждый наш клиент получил свое приобретение в целости и сохранности.</p>
    			<p><span class="missismail_question"></span>Мы решаем все всплывающие вопросы и проблемы при заказе за Вас.</p>
    			<p><span class="missismail_quality"></span>Наша сила это качество предлагаемых нами услуг.</p>
    		</div>
    	</div>
    </div>
    
    <!-- WORK -->
    <div class="container-fluid work">
    	<div class="row content_wrapper">
    		<div class="col-md-12 work_content">
    			<h3>Как <span>МЫ РАБОТАЕМ</span></h3>
    			<div class="work_list">
    
    				<div class="work_help">
    					<h4>Покупка с нашей помощью</h4>
    					<div class="work_text">
    						<span class="work_login"></span>
    						<p>Вы регистрируетесь на нашем сайте и заполняете заявку на покупку нужного вам товара.</p>
    					</div>
    					<div class="work_text">
    						<span class="work_pay"></span>
    						<p>Вы вносите предоплату 30% от стоимости товара, и мы его выкупаем.</p>
    					</div>
    					<div class="work_text">
    						<span class="work_get"></span>
    						<p>Мы получаем посылку на склад, проверяем ее, если необходимо переупаковываем и выставляем вам счёт к оплате.</p>
    					</div>
    					<div class="work_text">
    						<span class="work_send"></span>
    						<p>Вы оплачиваете счёт (за вычетом предоплаты), мы отправляем проверенную и переупакованную посылку по вашему адресу.</p>
    					</div>
    					<div class="work_link">
    						<a href="#">УЗНАТЬ БОЛЬШЕ</a>
    					</div>
    				</div>
    
    				<div class="work_example">
    					<div class="work_example_content">
    						<div class="work_img">
    							<span>Пример заказа</span>
    							<img src="{{ asset('assets/images/desktop/work_example-min.png') }}" alt="work_example">
    						</div>
    						<p>С нашей помощью Вы приобрели товар(его вес составляет 1,5 кг).</p>
    						<p>Его стоимостью 60 € + доставка по Германии на наш склад 5,99 €. </p>
    						<p>Мы получили ваш товар на склад, проверили, сделали фото, если нужно, переупаковали. </p>
    						<p>Посылка готова к отправке на ваш адрес. </p>
    						<p>Стоимость доставки DHL 19,09 €.</p>
    						<p>Итого 60 € + 5,99 € + 19,09 € + 15 € (Наши услуги)= 100,08 €</p>
    						<p>Выставленный нами счет Вы оплачиваете и мы высылаем ваш заказ по указаному адресу.</p>
    						<p>В течение 2-4 недель Вы получаете ваш заказ на почте или у себя дома.</p>
    					</div>
    				</div>
    
    				<div class="work_virtual">
    					<h4>Виртуальный адрес</h4>
    					<div class="work_text">
    						<span class="work_pay_self"></span>
    						<p>Вы сами заказываете и оплачиваете покупки.</p>
    					</div>
    					<div class="work_text">
    						<span class="work_warn"></span>
    						<p>Вы регистрируетесь на нашем сайте и сообщаете нам, что сделали заказ и товар следует к нам на склад.</p>
    					</div>
    					<div class="work_text">
    						<span class="work_get"></span>
    						<p>Мы получаем ваш товар на склад, переупаковываем (если необходимо) посылку  и выставляем вам счёт к оплате.</p>
    					</div>
    					<div class="work_text">
    						<span class="work_send"></span>
    						<p>Вы оплачиваете счёт и мы отправляем проверенную посылку по указаному вами адресу.</p>
    					</div>
    					<div class="work_link">
    						<a href="#">УЗНАТЬ БОЛЬШЕ</a>
    					</div>
    				</div>
    
    			</div> <!--work_list-->
    		</div>
    	</div>
    </div>
    
    <!-- PRICE -->
    <div class="container-fluid price">
    	<div class="row content_wrapper">
    		<div class="col-md-12 price_content">
    			<h3>Наши <span>ТАРИФЫ </span>зависят от стоимости вашей покупки.</h3>
    			<div class="price_list">
    				<div class="price_item">
    					<div class="price_top">
    						<h4>Покупка с нашей помощью</h4>
    					</div>
    					<p>До 50 € (макс. 20 кг. ) <br> 
    						наши услуги составят 15 €
    					</p>
    					<p>От 50 € до 100 € (макс. 20 кг. ) <br>
    						наши услуги составят 20 €
    					</p>
    					<p>От 100 € до 500 € (макс. 20 кг. ) <br>
    						наши услуги составят 25 €
    					</p>
    					<p>	От 500 € до 900 € (макс. 20 кг. ) 
    						наши услуги составят 30 €
    					</p>
    					<div class="price_link">
    						<a href="#">ЗАКАЗАТЬ</a>
    					</div>
    				</div>
    
    				<div class="price_item">
    					<div class="price_top">
    						<h4>Виртуальный адрес</h4>
    					</div>
    					<p>До 50 € (макс. 20 кг. ) <br>
    						наши услуги составят 10 €
    					</p>
    					<p>От 50 € до 100 € (макс. 20 кг. ) <br>
    						наши услуги составят 15 €
    					</p>
    					<p>От 100 € до 500 € (макс. 20 кг. ) <br>
     						наши услуги составят 20 €
    					</p>
    					<p>	От 500 € до 900 € (макс. 20 кг. ) <br>
    						наши услуги составят 25 €
    					</p>
    					<div class="price_link">
    						<a href="#">ЗАКАЗАТЬ</a>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    
    
    <!-- SERVICE -->
    <div class="container-fluid service">
    	<div class="row content_wrapper">
    		<div class="col-md-12 service_content">
    			<h3>Наш <span>СЕРВИС</span></h3>
    			<div class="service_list">
    				<div class="service_item">
    					<div class="service_block">
    						<span class="service_text service_b"></span>
    						<p> –упаковка (если повреждена или ненадёжная)</p>
    					</div>
    					<div class="service_block">
    						<span class="service_text service_e"></span>
    						<p> –оформление и выкуп заказа</p>
    					</div>
    					<div class="service_block">
    						<span class="service_text service_c"></span>
    						<p> –решаем проблемы с продавцом или товаром</p>
    					</div>
    					<div class="service_block">
    						<span class="service_text service_p"></span>
    						<p> –удаление фабричной упаковки (напр. обувных коробок)</p>
    					</div>
    					<div class="service_block">
    						<span class="service_text service_l"></span>
    						<p> –консолидация товара</p>
    					</div>
    					<div class="service_block">
    						<span class="service_text service_a"></span>
    						<p> –хранение товара на складе до 30 дней</p>
    					</div>
    					<div class="service_block">
    						<span class="service_text service_t"></span>
    						<p> –объединение заказов при совместных покупках</p>
    					</div>
    					<div class="service_block">
    						<span class="service_text service_h"></span>
    						<p> –звонок в любой магазин Германии</p>
    					</div>
    					<div class="service_block">
    						<span class="service_text service_o"></span>
    						<p> –заполнение таможенной декларации и сопроводительных документов DHL</p>
    					</div>
    				</div>
    				<div class="service_img">
    					<img src="{{ asset('assets/images/desktop/service_img-min.png') }}" alt="service_img">
    				</div>
    			</div>
    
    		</div>
    	</div>
    </div>
@stop

@section('footer')
	@include('layouts.footer')
@endsection