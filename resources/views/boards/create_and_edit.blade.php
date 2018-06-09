@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">

            <div class="panel-heading">
                <h1>
                    <i class="glyphicon glyphicon-edit"></i> 掲示板
                    @if($board->id)
                        編集
                    @else
                        新規追加
                    @endif
                </h1>
            </div>
            @include('common.error')
            <div class="panel-body">
                @if($board->id)
                {{Form::open(['route' => 'boards.update'])}}
                @else
                {{Form::open(['route' => 'boards.store'])}}
                @endif
                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                    <div class="form-group">
                        <h3>タイトル</h3>
                        <input type="text" class="form-control" name="title" value="{{old('title')}}">
                        <h3>内容</h3>
                        <textarea name="description" style="margin-bottom: 15px;" class="form-control" rows="8" cols="80">{{old('description')}}</textarea>
                        <button type="submit" class="btn btn-primary">登録</button>
                        <a class="btn btn-link pull-right" href="{{ route('boards.index') }}"><i class="glyphicon glyphicon-backward"></i> 戻る</a>
                    </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>

@endsection
