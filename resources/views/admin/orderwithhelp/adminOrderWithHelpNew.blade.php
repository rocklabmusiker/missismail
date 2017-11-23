@extends('admin.layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 orderWithHelp_menu">
            <div class="panel panel-success">
                <div class="panel-heading">Заказы с нашей помощью</div>

                <div class="panel-body">
                    <div class="adminMenu">
                        <a href="{{ route('adminHome') }}">ГЛАВНАЯ</a>
                        <a href="{{ route('adminOrderWithHelpNew') }}" class="{{ ( Request::is('admin/orderWithHelpNew')) ? 'adminMenu_class' : ' ' }}">НОВЫЕ</a>
                        <a href="{{ route('adminOrderWithHelpInProcessing') }}" >В ОБРАБОТКЕ</a>
                        <a href="{{ route('adminOrderWithHelpDone') }}" >ОБРАБОТАНЫЕ</a>
                        <a href="{{ route('adminOrderWithHelpArchive') }}" >АРХИВ</a>
                    </div>
                    <table class="table table-bordered table-hover table-responsive">     
                        <tr>
                            <th style="width: 5%;">ID</th>
                            <th style="width: 15%;">ДАТА</th>
                            <th style="width: 25%;">ИМЯ</th>
                            <th style="width: 30%;">E-MAIL</th>
                            <th style="width: 45%;">ПРОФИЛЬ</th>  
                        </tr>
                        @if(isset($ordersNew))
                            @foreach($ordersNew as $orderNew)
                                <tr>
                                    <td>{{ $orderNew->user->id }}</td>
                                    <td>{{ date('d M. Y', strtotime($orderNew->created_at)) }}</td>
                                    <td>{{ $orderNew->user->name }} {{ $orderNew->user->lastname }}</td>
                                    <td>{{ $orderNew->user->email }}</td>
                                    <td><a href="{{ route('adminUserProfilOrderWithHelp',['id' => $orderNew->user->id, 'order_id' => $orderNew->id]) }}">>>> ССЫЛКА НА ПРОФИЛЬ <<<</a></td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
              
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
