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
    <link href="{{ asset('assets/css/admin.css') }}" rel="stylesheet">
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
                            <li><a href="{{ route('login') }}">Войти</a></li>
                            <li><a href="{{ route('register') }}">Регистрация</a></li>
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

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('assets/js/bootstrap-filestyle.min.js') }}"></script>
    <script src="{{ asset('assets/js/admin.js') }}"></script>
    <script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>
    <script>
        function deleteOrder() {
          var result = confirm("Хотите удалить весь заказ?");
          if (result) {
           return true;
          } else {
           return false;
          }
        }
        function updateMoney() {
          var result = confirm("Хотите обновить счёт клиента?");
          if (result) {
           return true;
          } else {
           return false;
          }
        }

        function accessBuySelf() {
            var result = confirm('Хотите изменить доступ для виртуального адреса?');
            if(result) {
                return true;
            } else {
                return false;
            }
        }

        function updateStatus() {
            var result = confirm('Хотите изменить статус заказа?');
            if(result) {
                return true;
            } else {
                return false;
            }
        }

        function testimonialStatus() {
            var result = confirm('Одобрить отзыв, ваша милость?');
            if(result) {
                return true;
            } else {
                return false;
            }
        }

        function updateMemo() {
            var result = confirm('Внести заметку?');
            if(result) {
                return true;
            } else {
                return false;
            }
        }
        function deleteMemo() {
            var result = confirm('Удалить заметку?');
            if(result) {
                return true;
            } else {
                return false;
            }
        }
    </script>

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

    <!-- Accordion Шаблонов писем-->
    <script>
        $('#adminUserProfile_content').find('.adminUserProfile_top-botton').click(function(){
           $(this).next().slideToggle();
           $(".termine_acc").not($(this).next()).slideUp();
             
        });
    </script>
  
    <script>
        function deleteMail() {
            var result = confirm('Хотите удалить это сообщение?');
            if(result) {
                return true;
            } else {
                return false;
            }
        }
    </script>
     <script>
        function createNews() {
            var result = confirm('Хотите создать новость?');
            if(result) {
                return true;
            } else {
                return false;
            }
        }

        function deleteNews() {
            var result = confirm('Хотите удалить новость?');
            if(result) {
                return true;
            } else {
                return false;
            }
        }

        function createShop() {
            var result = confirm('Хотите добавить магазин?');
            if(result) {
                return true;
            } else {
                return false;
            }
        }

        function deleteShops() {
            var result = confirm('Хотите удалить магазин?');
            if(result) {
                return true;
            } else {
                return false;
            }
        }

        $('#newsEdit_content').find('.newsEdit_top-botton').click(function(){
           $(this).next().slideToggle();
           $(".newsEdit_acc").not($(this).next()).slideUp();
             
        });

        $('#shopsEdit_content').find('.shopsEdit_top-botton').click(function(){
           $(this).next().slideToggle();
           $(".shopsEdit_acc").not($(this).next()).slideUp();
             
        });

       

    </script>

    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>

    <script> CKEDITOR.replace( 'editorHelp' );</script>
    <script> CKEDITOR.replace( 'editorSelf' );</script>

   
    
</body>
</html>
