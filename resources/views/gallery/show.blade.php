@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{$gallery->title}}</h2>
	@if($gallery->content_type == "image")
	    <img src="{{$gallery->content_id}}" class="original-gallery->show-image" alt="{{$gallery->content_description}}"
	@elseif($gallery->contnet_type == "text")
	    <p class="original-gallery-show-text>{{$gallery->content_description}}</p>
	@endif
    </div>
@endsection
