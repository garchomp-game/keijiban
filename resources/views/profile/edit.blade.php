@extends('layouts.app')

@section('content')
<div class="container">
    {{Form::open(['route' => ['profile.update', user('id')], 'method' => 'put', "class" => 'form-group'])}}
        <h4>名前：</h4>
        <input class="form-control" type="text" name="name" value="{{user('name')}}">
        <h4>性別：</h4>
        <input class="form-control" name="sex" type="text" value="{{user('sex')}}">
        <h4>趣味：</h4>
        <input class="form-control" name="hobby" type="text" value="{{user('hobby')}}">
        <h4>自己紹介</h4>
        <textarea class="form-control" style="margin-bottom:15px;" name="description" rows="8" cols="80">{{user('description')}}</textarea>
        <input class="form-control btn btn-success" type="submit" name="submit" value="更新">
    {{Form::close()}}
</div>
@endsection
