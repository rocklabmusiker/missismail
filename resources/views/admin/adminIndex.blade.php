@extends('admin.layouts.app')



@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">Насяльника, {{ Auth::user()->name }} {{ Auth::user()->lastname }}, здравствуйте!</div>

                <div class="panel-body">
                    <div class="adminMenu">
                        <div class="adminMenu_button">
                            <a href="{{ route('adminOrderWithHelpNew') }}">Заказы с нашей помощью </a> 
                        </div>
                        <div class="adminMenu_button">
                            <a href="{{ route('adminOrderSelfNew') }}">Собственные заказы </a>
                        </div>
                        <div class="adminMenu_button">
                            <a href="{{ route('newsEditShow') }}">Редактор Новостей</a>
                        </div>
                        <div class="adminMenu_button">
                            <a href="{{ route('shopEditShow') }}">Редактор Магазина</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="adminUserProfileTable">
                        <h3>Общая статистика</h3>
                        <table class="table table-bordered table-hover table-responsive">     
                            <tr>
                                <th style="width: 70%;">Количество зарегистрированых пользователей за всё время</th>
                                @if(isset($user_reg_count))
                                <td>{{ $user_reg_count }}</td>
                                @endif
                            </tr>
                            <tr>
                                <th style="width: 70%;">Зарегистрировалось сегодня</th>
                               
                                <td>{{ $user_reg }}</td>
                                  
                            </tr>
                        </table> 
                        <table class="table table-bordered table-hover table-responsive">     
                            <tr>
                                <th style="width: 70%;">Заказы с нашей помощью за всё время</th>
                                @if(isset($order_with_help_count))
                                <td>{{ $order_with_help_count }}</td>
                                @endif
                            </tr>
                            <tr>
                                <th style="width: 70%;">Заказы с нашей помощью за сегодня</th>
                                <td>{{ $order_with_help }}</td>
                            </tr>
                        </table> 
                        <table class="table table-bordered table-hover table-responsive">     
                            <tr>
                                <th style="width: 70%;">Собственные заказы за всё время</th>
                                @if(isset($order_self_count))
                                <td>{{ $order_self_count }}</td>
                                @endif
                            </tr>
                            <tr>
                                <th style="width: 70%;">Собственные заказы за сегодня</th>
                                <td>{{ $order_self }}</td>
                            </tr>
                        </table>     
                    </div>
                    <div class="adminUserProfileTable">
                        <h3>Отзывы на модерацию</h3>
                        @if(isset($testimonials))
                            <ul class="testimonials">
                                @foreach($testimonials as $testimonial)
                                    @if($testimonial->accepted == 0)
                                        <li class="testimonialsBox">
                                            <div class="testimonials_top-botton">
                                                <a href="{{ route('adminIndexShowTestimonial', ['id' => $testimonial->id]) }}">
                                                    <h5>{{  $testimonial->created_at }} <<< Отзыв на модерацию >>> {{  $testimonial->name }}</h5>
                                                </a>
                                            </div>
                                        </li> 
                                    @endif  
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
