<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<title>Missismail</title>
	<style>

	body {
		background-color: #f2f2f2;
		font-family: 'Roboto', sans-serif;
		margin: 0;
		padding: 0;
		height: 100%;
		color: #080908;
	}

	h1, h2, p {
		color: #080908;
	}

	.wrapper {
		max-width: 1200px;
		width: 100%;
		margin: 0 auto;
	}

	.header {
		background-color: #4b9001;
		margin: 0;
	}

	.header_flex {
		display: flex;
		-webkit-justify-content: space-around;
		        justify-content: space-around;
		-webkit-align-items: center;
		        align-items: center;
		-webkit-flex-wrap: wrap;
		    -ms-flex-wrap: wrap;
		        flex-wrap: wrap;
		padding: 0 15px;
	}

	.header a {
		text-decoration: none;		
	}

	.header span {
		color: #fff;
		font-size: 16px;
		text-align: center;
		display: block;
	}
	
	.menu li {
		display: inline-block;
		list-style: none;
		padding: 0 15px;
		margin: 10px 0;	
	}

	.menu li a {
		color: #FFF;
		font-size: 14px;
		-webkit-transition: all .4s ease;
			   -moz-transition: all .4s ease;
			    -ms-transition: all .4s ease;
			     -o-transition: all .4s ease;
			        transition: all .4s ease;	
	}

	.menu li a:hover {
		color: #ea410e;	
	}
	
	/* footer */
	
	.footer {
		background-color: #4b9001;
		margin: 0;
	}

	.footer_content {
		display: flex;
		-webkit-justify-content: space-around;
		        justify-content: space-around;
	    -webkit-align-items: center;
	            align-items: center;
		-webkit-flex-wrap: wrap;
		    -ms-flex-wrap: wrap;
		        flex-wrap: wrap;
		padding: 0 15px;
		margin: 0;
	}

	.footer_content li {
		display: inline-block;
		padding: 0 15px;
		color: #FFF;
		font-size: 14px;
		margin: 10px 0; 
	}

	.footer_content li a {
		color: #FFF;
		font-size: 14px;
		display: inline-block;
		text-decoration: none;
		border-bottom: 1px solid #fff;
		padding-bottom: 2px;
		-webkit-transition: all .4s ease;
		   -moz-transition: all .4s ease;
		    -ms-transition: all .4s ease;
		     -o-transition: all .4s ease;
		        transition: all .4s ease;
	}

	.footer_content li a:hover {
		border-bottom: 1px solid #ea410e;
	}


	/* content */
	
	.content {
		background-color: #f4f1ec;
		padding: 50px;
		height: auto;
		min-height: calc(100vh - 215px);
		
	}
	h2 { 
		font-size: 20px;
		text-align: center; 
		margin: 0;
	}

	h2:after {
		content: '';
		display: block;
		max-width: 150px;
		width: 100%; 
		height: 3px;
		background-color: #ea410e;
		margin: 5px auto 0;
		
	}

	h4 { 
		margin: 50px 0 0 0;
		font-size: 14px;
		font-weight: normal; 
	}

	p {
		font-size: 14px;
	}

	</style>
</head>
<body>
	
	<div class="wrapper">
		<div class="header">
			<div class="header_flex">
				<a href="https://missismail.com"><span>MISSISMAIL</span></a>
				<ul class="menu">
					<li><a href="https://missismail.com">Главная</a></li>
					<li><a href="https://missismail.com/tarif">Тарифы</a></li>
					<li><a href="https://missismail.com/shops">Магазины</a></li>
					<li><a href="https://missismail.com/login">Личный кабинет</a></li>
				</ul>
			</div>
		</div>
	</div>
	
	<div class="wrapper">
		<div class="content">
			<h2>Сообщение со страницы клиента, "Самостоятельная покупка"</h2>

			<h4>Наименование заказа: {{ $name }}</h4>

			<p>E-mail отправителя: {{ $user_email }}</p>

			<p>Цена: {{ $price }} €</p>

			<p>Количество: {{ $value }}</p>

			<p>Цвет: {{ $color }}</p>

			<p>Размер: {{ $size }}</p>

			<p>{{ $comment }}</p>

		</div>
	</div>
	
	
	<div class="wrapper">
		<div class="footer">
			<ul class="footer_content">
				<li><a href="https://missismail.com/rules">Соглашение</a></li>
				<li>Tel: (+49)15122275739</li>
				<li><a href="https://missismail.com/politicConf">Политика конфиденциальности</a></li>
			</ul>
		</div>
	</div>
	
	
	
</body>
</html>



