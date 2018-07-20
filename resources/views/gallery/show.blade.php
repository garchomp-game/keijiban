@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{$gallery->title}}</h2>
        <p>{{$gallery->description}}</p>
	@if($gallery->content_type == "image")
	    <img src="{{url('storage/'.$gallery->path)}}" style="margin: auto; width:100%;" alt="{{$gallery->content_description}}">
	@elseif($gallery->content_type == "text")
	    <p class="original-gallery-show-text">{{$gallery->content_description}}</p>
	@endif
    </div>
@endsection
