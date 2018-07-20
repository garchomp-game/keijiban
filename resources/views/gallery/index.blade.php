@extends('layouts.app')

@section('content')
    <div class="container">
        @if (user('id') == $user->id)
            <a href="{{route('gallery.create', [$user->id])}}" class="btn btn-info">新規追加</a>
        @endif
        @if (count($gallery) != 0)
            <ul class="row" style="padding:0; margin:15px 0;">
                @foreach ($gallery as $value)
                    <a class="col-md-4 original-gallery-index-ul btn" href="{{route('gallery.show', [user('id'), $value->id])}}" style="list-style:none; height:300px;">
                        <h3>{{$value->title}}</h3>
                        <p>{{$value->description}}</p>
                        @if($value->content_type == "image")
                            <img style="width:100%; height:70%;" src="{{url('storage/'.$value->path)}}">
                        @elseif($value->content_type == "text")
                            <p class="original_override_text">{{$value->content_description}}</p>
                        @endif
                    </a>
                @endforeach
            </ul>
        @else
            <h3 class="alert alert-info">not found</h3>
        @endif
    </div>
@endsection
