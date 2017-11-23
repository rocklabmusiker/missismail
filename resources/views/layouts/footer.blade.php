    <div class="container-fluid footer">
    	<div class="row content_wrapper">
    		<div class="col-md-12 footer_list">
    			<div class="footer_contact">
    				<div class="footer_logo">
    					<!-- <h4>Доставка товара из Германии</h4> -->
    				</div>
    				<div class="footer_country">
    					<h4>КОНТАКТ</h4>
    					<p>GERMANY<span></span></p>
    				</div>
    				<div class="footer_phone">
    					<p>Tel:  (+49)4351 - 883858</p>
    					<p>(+49)151 - 22275739</p>
    				</div>
    			</div>
    			<div class="footer_social">
    				<div class="footer_block">
    					<span class="footer_email"></span>
    					<p>info@missismail.com</p>
    				</div>
    				<div class="footer_block">
    					<span class="footer_skype"></span>
    					<p><span class="missis_m">M</span>ISSIS<span class="missis_m">M</span>AIL</p>
    				</div>
    				<!-- <div class="footer_block">
                        <span class="footer_youtube"></span>
                        <p>Наш канал: <a href="#">В гостях у <span class="missis_m">M</span>ISSIS<span class="missis_m">M</span>AIL</a></p>
                    </div> -->
    				<div class="footer_block">
    					<span class="footer_facebook"></span>
    					<p>Наша группа в Facebook: <a href="#"><span class="missis_m">M</span>ISSIS<span class="missis_m">M</span>AIL</a></p>
    				</div>
    				<div class="footer_block">
    					<span class="footer_vk"></span>
    					<p>Наша группа в Контакт: <a href=""><span class="missis_m">M</span>ISSIS<span class="missis_m">M</span>AIL</a></p>
    				</div>
    			</div>
    			<div class="footer_form">

    				<div class="footer_form__top">
    					<h4>Остались вопросы?</h4>
    				</div>
                   
    				<form action="{{ route('index') }}" method="post" name="indexForm" id="FormFooter">
                        {{ csrf_field() }}
    					<input type="text" name="name" placeholder="Ваше имя" value="{{ old('name') }}" required>
    					<input type="text" name="email" placeholder="Ваш E-mail" value="{{ old('email') }}" required>
    					<textarea type="text" name="text" placeholder="Ваше сообщение">{{ old('text') }}</textarea>
    					<div class="footer_button">
    						<input type="submit" value="ОТПРАВИТЬ СООБЩЕНИЕ">
    					</div>
    				</form>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="container-fluid impressum">
    	<div class="row content_wrapper">
    		<div class="col-md-12 impressum_block">
    			<a href="{{ route('impressum') }}">Impressum</a>
                <a href="{{ route('datenSchutz') }}">Datenschutzerklärung</a>
                 <a href="{{ route('politicConf') }}">Политика конфиденциальности</a>
                <a href="{{ route('rules') }}">Соглашение</a>
    		</div>
    	</div>
    </div>