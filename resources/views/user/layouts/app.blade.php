<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Missismail') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/alertify.js/0.5.0/alertify.default.min.css">
    <link href="{{ asset('assets/css/user.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ route('index') }}">
                        {{ config('app.name', 'Missismail') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            @yield('links_registration')
                        @else
                        

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Выйти <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Выйти
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

      
        @yield('userMenu')
        @yield('content')
        

        

    </div>

    <!-- Scripts -->
    @if( ! Request::is('user/payment'))
        <script src='{{ asset("js/app.js")}}'></script>
    @else
        ''
    @endif
    
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
    <script src="{{ asset('assets/js/bootstrap-filestyle.min.js') }}"></script>
    <script src="{{ asset('assets/js/user.js') }}"></script>
    <script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>

    

    @if(session('success'))
        <script>
            alertify.success('{{ session('success') }}');
        </script>
    @endif

    @if(count($errors) > 0)            
        @foreach($errors->all() as $error)
            <script>
                alertify.error('{{ $error }}');
            </script>      
        @endforeach                  
    @endif

    @if(session('error'))
        <script>
            alertify.error('{{ session('error') }}');
        </script>
    @endif

    <script>
        $('#allHelpOrder_content').find('.allHelpOrder_top-botton').click(function(){
            $(this).next().slideToggle();
            $(".allHelpOrder_acc").not($(this).next()).slideUp();
             
        });
    </script>

   <script>
        function OrderWithHelpDelete() {
            var result = confirm('Удалить заказ?');
            if(result) {
                return true;
            } else {
                return false;
            }
        }
   </script>
    <script>
        $('#allSelfOrder_content').find('.allSelfOrder_top-botton').click(function(){
            $(this).next().slideToggle();
            $(".allSelfOrder_acc").not($(this).next()).slideUp();
             
        });
    </script>
    <script>
        function OrderSelfDelete() {
            var result = confirm('Удалить заказ?');
            if(result) {
                return true;
            } else {
                return false;
            }
        }
   </script>

   <script>
        $('#adminEmails_content').find('.adminEmails_top-botton').click(function(){
            $(this).next().slideToggle();
            $(".adminEmails_acc").not($(this).next()).slideUp();
             
        });
    </script>

     <script>
        function deleteAdminEmail() {
            var result = confirm('Удалить сообщение?');
            if(result) {
                return true;
            } else {
                return false;
            }
        }
   </script>

    <script>
        $('#userEmails_content').find('.userEmails_top-botton').click(function(){
            $(this).next().slideToggle();
            $(".userEmails_acc").not($(this).next()).slideUp();
             
        });
    </script>

 
 
</body>
</html>
