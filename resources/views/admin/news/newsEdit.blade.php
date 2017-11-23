@extends('admin.layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 adminUserProfile_menu">
            <div class="panel panel-success">
                <div class="panel-heading">Редактор Новостей</div>

                <div class="panel-body">
                    <div class="adminMenu">
                        <a href="{{ route('adminHome') }}">ГЛАВНАЯ</a>
                    </div>
                    <div class="editNewsTable">
	                    <h3>Создание новости</h3>
                		<form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{ route('newsCreate')}}">
                			{{ csrf_field() }}
 							{{ method_field('PUT') }}
 							<div class="form-group">
							  	<input type="text" name="titel" class="form-control" placeholder="заголовок">
							</div>
							<div class="form-group">
							  	<textarea name="text" class="form-control" placeholder="текст"></textarea>
							</div>
							<div class="form-group">
							  	<input type="text" name="exerpt" class="form-control" placeholder="отрывок">
							</div>
							<div class="form-group">
							  	<input type="text" name="image" class="form-control" placeholder="картинка">
							</div>
							<div class="form-group">
								<label for="file">Закрузить фото</label>
								<input type="file" name="file" class="filestyle" data-btnClass="btn-default" data-placeholder="Файл отсутствует"  data-text="Загрузить файл">
							</div>
							<div class="form-group">
							    <button type="submit" class="btn btn-default" onclick="return createNews();">Создать новость</button>
							</div>
                		</form>
                    </div>
                     <div class="editNewsTable">
	                    <h3>Все новости</h3>
	                    @if(isset($news))
			                <ul class="newsEdit_content" id="newsEdit_content">	
			                    @foreach($news as $news)    
									<li class="newsEdit_accordion">
										<div class="newsEdit_top-botton">
											<h4>{{ $news->titel }} <span>({{ date('d M. Y', strtotime($news->created_at)) }})</span></h4>
											<p>{{ $news->exerpt }}</p>
										</div>

										<div class="newsEdit_text newsEdit_acc">
											<img src="{{ asset('assets/images/news/' . $news->image) }}" alt="{{ $news->image }}">
											<p>{{ $news->text }}</p>
											<form class="form-inline" method="post" action="{{ route('newsDelete', ['id' => $news->id])}}">
												{{ csrf_field() }}
													{{ method_field('DELETE') }}
												<div class="form-group">
												    <button type="submit" class="btn btn-default" onclick="return deleteNews();">Удалить новость</button>
												</div>
											</form>
										</div>
									</li>
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


		




