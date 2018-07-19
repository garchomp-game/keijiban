@extends('layouts.app')

@section('content')
    <div class="container">
        @if (user('id') == $user->id)
            <a href="{{route('gallery.create', [$user->id])}}" class="btn btn-info">新規追加</a>
        @endif
	    @forelse ($gallery as $value)
            <ul>
        		<li>
        		    <h3>{{$value->title}}</h3>
        		    <p>{{$value->description}}</p>
        		    @if($value->content_type == "image")
        			<img src="{{$value->content_id}}" alt={{"$value->content_description"}}>
        		    @elseif($value->contnet_type == "text")
        			<p class="original_override_text">{{$value->content_description}}</p>
        		    @endif
        		</li>
            </ul>
        @empty
            <h3 class="alert alert-info">not found</h3>
        @endforelse
    </div>
@endsection
