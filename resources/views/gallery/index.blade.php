@extends('layouts.app')

@section('content')
    <div class="container">
        <ul>
	    @foreach ($gallery as $value)
		<li>
		    <h3>{{$value->title}}</h3>
		    <p>{{$value->description}}</p>
		    @if($value->content_type == "image")
			<img src="{{$value->content_id}}" alt={{"$value->content_description"}}>
		    @elseif($value->contnet_type == "text")
			<p class="original_override_text">{{$value->content_description}}</p>
		    @endif
		</li>
	    @endforeach
	</ul>
    </div>
@endsection
