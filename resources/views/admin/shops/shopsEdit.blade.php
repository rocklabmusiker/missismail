@extends('admin.layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 adminUserProfile_menu">
            <div class="panel panel-success">
                <div class="panel-heading">Редактор Магазинов</div>

                <div class="panel-body">
                    <div class="adminMenu">
                        <a href="{{ route('adminHome') }}">ГЛАВНАЯ</a>
                    </div>
                    <div class="editShopsTable">
	                    <h3>Создание магазина</h3>
                		<form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{ route('shopCreate')}}">
                			{{ csrf_field() }}
 							{{ method_field('PUT') }}
 							<div class="form-group">
							  	<input type="text" name="titel" class="form-control" placeholder="Название магазина">
							</div>
							<div class="form-group">
							  	<input type="text" name="link" class="form-control" placeholder="ссылка">
							</div>
							<div class="form-group">
							  	<input type="text" name="filter" class="form-control" value="clothes shoes sport electronics car">
							</div>
							<div class="form-group">
							  	<input type="text" name="image" class="form-control" placeholder="картинка">
							</div>
							<div class="form-group">
								<label for="file">Закрузить фото</label>
								<input type="file" name="file" class="filestyle" data-btnClass="btn-default" data-placeholder="Файл отсутствует"  data-text="Загрузить файл">
							</div>
							<div class="form-group">
							    <button type="submit" class="btn btn-default" onclick="return createShop();">Создать магазин</button>
							</div>
                		</form>
                    </div>
                     <div class="editShopsTable">
	                    <h3>Все магазины</h3>
	                    @if(isset($shops))
			                <ul class="shopsEdit_content" id="shopsEdit_content">	
			                    @foreach($shops as $shop)    
									<li class="shopsEdit_accordion">
										<div class="shopsEdit_top-botton">
											<h4>{{ $shop->titel }} <span>({{ date('d M. Y', strtotime($shop->created_at)) }})</span></h4>
											<p>Фильтр: {{ $shop->filter }}</p>
										</div>
										<div class="shopsEdit_text shopsEdit_acc">
											<img src="{{ asset('assets/images/shops/' . $shop->image) }}" alt="{{ $shop->image }}">
											<form class="form-inline" method="post" action="{{ route('shopDelete', ['id' => $shop->id])}}">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}
												<div class="form-group">
												    <button type="submit" class="btn btn-default" onclick="return deleteNews();">Удалить магазин
												    </button>
												</div>
											</form>
										</div>
									</li>
								@endforeach	
							</ul>
							{!! $shops->appends(['sort' => 'id'])->render() !!}  
						@endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
