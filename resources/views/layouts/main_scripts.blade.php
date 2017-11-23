<!DOCTYPE html>
<html lang="ru">
<head>
    	<meta charset="UTF-8">
    	<!-- <meta name="viewport" content="width=1200"> 
    	<meta http-equiv="content-language" content="ru">-->
    	<meta name="description" content="">
    	<meta name="keywords" content="">
    	<meta property="og:type" content="website"/>
    	<meta property="og:title" content=""/>
    	<meta property="og:type" content=""/>
    	<meta property="og:image" content=""/>
    	<meta property="og:description" content = ""/>
    	<meta id="viewport" name="viewport" content="width=device-width">
    
    	<title>Missismail</title>
    
    
    	<style>
    		/* pre-loader */
    		.loader{border:16px solid #f3f3f3;border-top:16px solid #3498db;border-radius:50%;width:100px;height:100px;margin:25% auto;animation:spin 2s linear infinite}@keyframes spin{0%{transform:rotate(0deg)}100%{transform:rotate(360deg)}}.pre-loader{position:fixed;z-index:100;top:0;right:0;bottom:0;left:0;background-color:#FFF;-webkit-transition:all .25s;-moz-transition:all .25s;-ms-transition:all .25s;-o-transition:all .25s;transition:all .25s}body.pre-loaded .pre-loader{-webkit-transform:translate3d(0,-100%,0);-moz-transform:translate3d(0,-100%,0);-ms-transform:translate3d(0,-100%,0);-o-transform:translate3d(0,-100%,0);transform:translate3d(0,-100%,0)}
    		/* here compressed css from head.css */
    	</style>
    	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/alertify.js/0.5.0/alertify.default.min.css">
    	<link rel=stylesheet type=text/css href="{{ asset('assets/css/main.css') }}">
    
</head>
<body>
	<!-- 	<div class="pre-loader">
		 <div class="loader"></div>
	</div> -->
    
    @yield('header')
    
    @yield('content')
    
    @yield('footer')
  

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>
    

    @if(session('success'))
        <script>
            alertify.success("{{ session('success') }}");

        </script>
    @endif

    @if(isset($errors))
        @foreach($errors->all() as $error)
            <p> 
                <script>
                    alertify.error("{{ $error }}");
                </script>
            </p>
        @endforeach
    @endif
 
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script src="{{ asset('assets/js/mixitup.min.js') }}"></script>

    <script>
        var containerEl = document.querySelector('.container');
        var mixer = mixitup(containerEl);

    </script>
    
</body>
</html>