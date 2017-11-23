@extends('layouts.main_scripts')

@section('header')
	@include('layouts.header')
@endsection 

@section('content')
	<div class="container-fluid shops">
    	<div class="row content_wrapper">
    		<div class="col-md-12">
    			

				<div class="controls">
		            <button type="button" class="control" data-filter="all">Все</button>
		            <button type="button" class="control" data-filter=".clothes">Одежда</button>
		            <button type="button" class="control" data-filter=".shoes">Обувь</button>
		            <button type="button" class="control" data-filter=".sport">Спорт</button>
		            <button type="button" class="control" data-filter=".electronics">Электроника</button>
		            <button type="button" class="control" data-filter=".car">Автозапчасти</button>
		        </div>
		        @if($shops)
			        <div class="container">
			        	@foreach($shops as $shop)
				            <div class="mix {{ $shop->filter }}">
				            	<img src="{{ asset('assets/images/shops/' . $shop->image) }}" alt="{{ $shop->image }}">
				            	<div class="item_hover">
						         	<div class="item_info"> 
						            	<a href="{{ $shop->link }}" target="_blank">Перейти в {{$shop->titel }}</a>
						         	</div>
						        </div>
				            </div>
			            @endforeach
			        </div>
		        @endif

		        


				


    		</div>
    	</div>
    </div>
    

@endsection