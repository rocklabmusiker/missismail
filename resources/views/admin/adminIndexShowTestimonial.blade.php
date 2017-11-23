@extends('admin.layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 adminUserProfile_menu">
            <div class="panel panel-success">
                <div class="panel-heading">Отзыв от Клиента</div>

                <div class="panel-body">
                    @if(isset($testimonial_id))
                        <div class="adminUserProfileTable">
                        	
                        	<h5>Дата: {{ $testimonial_id->created_at }}</h5>
                        	<h4>{{ $testimonial_id->name }}</h4>
                        	<p>{{ $testimonial_id->text }}</p>
                        	
                        </div>

                         <table class="table table-bordered table-hover table-responsive">     
                            <tr>
                                <th style="width: 40%;">
                                    <div class="adminUserProfileTable">
                                        <form class="form-inline" method="post" action="{{ route('adminIndexDeleteTestimonial', ['id' => $testimonial_id->id]) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-default" onclick="return deleteMail();">Удалить это сообщение</button>
                                            </div>
                                        </form>
                                    </div>
                                </th>
                                 <th style="width: 40%;">
                                     <div class="adminUserProfileTable">
                                        <form class="form-inline" method="post" action="{{ route('adminIndexUpdateTestimonial', ['id' => $testimonial_id->id]) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}
                                            <div class="form-group">
                                                <select class="form-control" name="accepted">
                                                    <option></option>
                                                    <option>0</option>
                                                    <option>1</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-default" onclick="return testimonialStatus();">Обновить</button>
                                            </div>
                                        </form>
                                    </div>
                                 </th>
                                 <th style="width: 20%;">
                                    <p class="testimonial_status">Статус отзыва: <span>{{ ($testimonial_id->accepted == 0) ? 'Не одобрен' : 'Одобрен' }}</span></p>
                                    
                                 </th>
                            </tr>
                        </table>
                    @endif  
                </div>
                <div class="panel-heading">
                	<a href="{{ route('adminHome') }}"> Вернуться назад </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



