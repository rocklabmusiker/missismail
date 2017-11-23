@extends('layouts.main_scripts')

@section('header')
	@include('layouts.header')
@endsection 

@section('content')
 
    <div class="container-fluid allTestimonials">
        <div class="row content_wrapper">
            <h3>Отзывы</h3>
            <div class="col-md-12 allTestimonials_block">
                @if(isset($allTestimonials))
                    @foreach($allTestimonials as $allTestimonial)
                        <div class="allTestimonials_box">
                            <div class="allTestimonials_content">
                                @if($allTestimonial->accepted == 1)
                                    <h4>{{ $allTestimonial->name}} <span>{{ date('d.m.Y', strtotime($allTestimonial->created_at) ) }}</span></h4>
                                    <p>{{ $allTestimonial->text }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach 
                    {!! $allTestimonials->render() !!}  
                @endif
            </div> 
        </div>
    </div>
    
   

	 
@endsection

@section('footer')
	@include('layouts.footer')
@endsection