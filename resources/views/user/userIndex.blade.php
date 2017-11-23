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
        <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">Личный кабинет</div> 
                <table class="table table-bordered table-hover table-responsive">
                    <tr>
                        <th style="width: 20%;">Ваш логин</th>
                        <th style="width: 20%;">№ кабинета</th>
                        <th style="width: 20%;">Баланс (€)</th>
                        <th style="width: 20%;">Покупок с нашей помощью</th>
                        <th style="width: 20%;">Самостоятельных покупок</th>
                    </tr>
                    <tr>
                        @if(isset($user))     
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->money }}€</td>
                            <td>{{ $orderHelpCount }}</td> 
                            <td>{{ $orderSelfCount }}</td>  
                        @endif
                    </tr>
                </table>
            </div>
             <div class="panel panel-default user_support">
              <div class="panel-heading">Служба поддержки</div> 
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 user_support-form">
                            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{ route('userIndex') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="theme">Тема</label>
                                    <input type="text" class="form-control" name="theme">
                                </div>
                                <div class="form-group">
                                    <label for="street">Сообщение</label>
                                    <textarea name="text" rows="3" class="form-control" ></textarea>
                                </div> 
                                <div class="form-group" >
                                    <input type="file" name="file" class="filestyle" id="attachedFile" data-btnClass="btn-default" data-placeholder="Файл отсутствует"  data-text="Загрузить файл">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default">Отправить</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-3 user_support-contact col-md-offset-1">
                            <p>Tel: (+49)15122275739</p>
                            <p>Skype: missismail</p>
                            <p>E-mail: info@missismail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
