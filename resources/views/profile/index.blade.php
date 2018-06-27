@extends('layouts.app')

@section('content')
    <div class="container">
        <ul class='list-group'>
            @foreach ($profile as $key => $value)
                <a href="{{route('profile.show', $value->id)}}" class='list-group-item row original-margin-15-0'>
                    <h3 class='col-md-4'>{{$value->name}}</h3>
                    <p class="col-md-8">{{$value->description}}</p>
                </a>
            @endforeach
        </ul>
    </div>
@endsection
