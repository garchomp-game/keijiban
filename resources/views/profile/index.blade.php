@extends('layouts.app')

@section('content')
    <div class="container">
        <ul class='list-group'>
            <h2>ユーザー一覧</h2>
            @foreach ($profile as $key => $value)
                <a href="{{route('profile.show', $value->id)}}" class='list-group-item row original-margin-15-0'>
                    <h3 class='col-md-4'>{{$value->name}}</h3>
                    <span class="col-md-7">{{$value->description}}</span>
                    @if (user('id') != $value->id)
                        <span href="{{route('follow', $value->id)}}" class="btn col-md-1"
                            style="font-size:36px;">💖</span>
                    @endif
                </a>
            @endforeach
        </ul>
    </div>
@endsection
