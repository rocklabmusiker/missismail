@extends('layouts.main_scripts')

@section('header')
	@include('layouts.header')
@endsection 

@section('content')
 
    <div class="container-fluid allNews">
        <div class="row content_wrapper">
            <h3>Новости</h3>
            <div class="col-md-12 allNews_block">
                @if(isset($allNews))
                    <div class="allNews_flex">
                         @foreach($allNews as $News)
                            <div class="allNews_box">
                                <div class="allNews_bild">
                                    <a href="{{ route('singleNews', ['id' => $News->id ]) }}">
                                        <img src="{{ asset('assets/images/news/' . $News->image) }}" alt="$allNews->image">
                                    </a>
                                </div>
                                <div class="allNews_content">
                                    <h4>{{ $News->titel}} <span>{{ date('d.m.Y', strtotime($News->created_at) ) }}</span></h4>
                                    <p>{{ $News->exerpt }}</p>
                                    <a href="{{ route('singleNews', ['id' => $News->id ]) }}">Читать далее</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {!! $allNews->render() !!}
                @endif
            </div> 
        </div>
    </div>
    
   

	 
@endsection

@section('footer')
	@include('layouts.footer')
@endsection