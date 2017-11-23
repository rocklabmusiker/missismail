
    <div class="container-fluid top">
    	<div class="row content_wrapper">
    		<div class="col-md-12 top_content">
    			<div class="top_contact">
    				<span class="top_phone"> (+49)15122275739</span>
    				<span class="top_email"> info@missismail.com</span>
    			</div>
    			<div class="top_social">
    				<a href="#" class="top_facebook"></a>
    				<a href="https://vk.com/missismail" class="top_vk"></a>
    			</div>
    		</div>
    	</div>
    </div>
    <!-- NAVBAR -->
    <nav>
    	<div class="container-fluid navbar">
    	  <div class="row content_wrapper">
    		<div class="col-md-12 navbar_content">
    			<div class="navbar_logo">
    				<!-- <h2>Доставка товара из Германии</h2> -->
    			</div>
    		  	<div class="navbar_menu">
    		  		<div class="navbar-header">
    				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
    				    <span class="sr-only">Toggle navigation</span>
    				    <span class="icon-bar"></span>
    				    <span class="icon-bar"></span>
    				    <span class="icon-bar"></span>
    				  </button>
    				</div>
    				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    				  <ul class="nav navbar-nav navbar-right">
    				    <li><a href="{{ route('index') }}" class="{{ ( Request::is('/')) ? 'navbar_active' : ' ' }}">ГЛАВНАЯ</a></li>
    				    <li><a href="{{ route('tarif') }}" class="{{ ( Request::is('tarif')) ? 'navbar_active' : ' ' }}">ТАРИФЫ</a></li>
    				    <li><a href="{{ route('shops') }}" class="{{ ( Request::is('shops')) ? 'navbar_active' : ' ' }}">МАГАЗИНЫ</a></li>
    				    <li><a href="{{ route('userIndex') }}" class="navbar_login">ЛИЧНЫЙ КАБИНЕТ</a></li>
    				  </ul>
    				</div>
    		  	</div>
    		</div>
    	  </div>
      	</div>
    </nav>