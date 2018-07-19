@extends('layouts.app')

@section('content')
    <div class="container">
        {{Form::open(['route' => 'support.store'])}}
	    <input type="text" name="title" placeholder="タイトル" value="{{session('title')}}>
	    <textarea name="description" placeholder="本文">
	    </textarea>
	{{Form::close()}}
    </div>
@endsection
