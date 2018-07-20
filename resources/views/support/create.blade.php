@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>お問い合わせ</h2>
        {{Form::open(['route' => 'support.store', 'class' => 'form-group'])}}
        @if (auth()->user())
            <input type="hidden" name="name" value="{{user('name')}}">
        @else
            <input type="text" name="name" value="{{request('name')}}">
        @endif
        <p>タイトル</p>
        {{$errors->first('title')}}
        <input type="text" name="title" placeholder="タイトル" class="form-control" value="{{request('title')}}">
        <p>本文</p>
        {{$errors->first('description')}}
        <textarea name="description" class="form-control" placeholder="本文">
            {{request('description')}}
        </textarea>
        <div style="height:30px;">

        </div>
        <input type="submit" name="submit" class="form-control btn-success" value="送信">
        {{Form::close()}}
    </div>
@endsection
