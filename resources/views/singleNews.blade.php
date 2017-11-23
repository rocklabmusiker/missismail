@extends('layouts.main_scripts')

@section('header')
	@include('layouts.header')
@endsection 

@section('content')
 
    <div class="container-fluid singleNews">s
        <div class="row content_wrapper">
            <div class="col-lg-8 col-md-12">
                @if(isset($singleNews))
                    <div class="singleNews_box">
                         <div class="singleNews_bild">
                            <img src="{{ asset('assets/images/news/' . $singleNews->image) }}" alt="$singleNews->image">
                        </div>
                        <div class="singleNews_content">
                            <h4>{{ $singleNews->titel}} <span>{{ date('d.m.Y', strtotime($singleNews->created_at) ) }}</span></h4>
                            <p>{{ $singleNews->text }}</p>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-lg-1 col-md-12"></div>
            <div class="col-lg-3 col-md-12 tarifs_sidebar">
                <div class="tarifs_siderbar-block tarifs_siderbar-news">
                    <a href="{{ route('allNews') }}">
                        <h4>Новости</h4>
                    </a>
                    @if(isset($news))
                        <div class="tarifs_sidebar-list">
                            @foreach($news as $news)
                                <div class="tarifs_sidebar-content">
                                    <div class="tarifs_sidebar-title">
                                        <h5>{{ $news->titel }}</h5><span>{{ date('d.m.y', strtotime($news->created_at)) }}</span>
                                    </div>
                                    <p>{{ $news->exerpt }}</p>
                                    <a href="{{ route('singleNews',['id' => $news->id ]) }}">>>> читать дальше</a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="tarifs_siderbar-block tarifs_siderbar-testimonials">
                    <a href="#">
                        <h4>Отзывы наших клиентов</h4>
                    </a>
                    <div class="tarifs_sidebar-list">
                        <div class="tarifs_sidebar-content">
                            <div class="tarifs_sidebar-title">
                                <h5>Lorem ipsum</h5><span>28.08.17</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum eligendi qui culpa magni architecto iure quas vel, natus nam eveniet.</p>
                        </div>
                        <div class="tarifs_sidebar-content">
                            <div class="tarifs_sidebar-title">
                                <h5>Lorem ipsum</h5><span>28.08.17</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum eligendi qui culpa magni architecto iure quas vel, natus nam eveniet.</p>
                        </div>
                        <div class="tarifs_sidebar-content">
                            <div class="tarifs_sidebar-title">
                                <h5>Lorem ipsum</h5><span>28.08.17</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum eligendi qui culpa magni architecto iure quas vel, natus nam eveniet.</p>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
    
   

	 
@endsection

@section('footer')
	@include('layouts.footer')
@endsection