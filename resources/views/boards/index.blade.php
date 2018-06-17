@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>
                        <i class="glyphicon glyphicon-align-justify"></i> 掲示板一覧
                        <a class="btn btn-success pull-right" href="{{ route('boards.create') }}"><i class="glyphicon glyphicon-plus"></i> 新規追加</a>
                    </h1>
                    {{Form::open(['route' => 'boards.index', 'method' => 'get', 'class' => 'form-group'])}}
                    <!-- Search form -->
                    <div class="md-form" style="margin-bottom:10px;">
                        <input class="form-control" type="text" name="title" placeholder="掲示板タイトル" aria-label="掲示板タイトル">
                    </div>
                    <div class="md-form" style="margin-bottom:10px;">
                        <input class="form-control" type="text" name="description" placeholder="掲示板詳細" aria-label="掲示板検索">
                    </div>
                    <input class="form-control btn-success" type="submit" name="submit" value="検索">
                    {{Form::close()}}
                </div>

                <div class="panel-body">
                    @if($boards->count())
                        <ul class="list-group">
                            @foreach($boards as $board)
                                <li class="original-table-style list-group-item">
                                    <h3 class="pull-left" style="display:block; margin:0 0 10px;">{{$board->title}}</h3>
                                    <div style="clear:both"></div>
                                    <span class="pull-left original-span-with" style="float:left;">{{$board->description}}</span><br>
                                    <div style="clear:both"></div>
                                    <span class="pull-right">
                                        <a class="btn btn-md btn-success original-button" href="{{ route('boards.show', $board->id) }}"><i class="glyphicon glyphicon-list"></i> 掲示板詳細</i></a>
                                        @if ($board->user_id == auth()->user()->id)
                                            {{Form::open(['route' => ['boards.destroy', $board->id], 'method' => 'delete', 'class' => 'form_inline', 'onsubmit' => "return confirm('本当に消しますか？');"])}}
                                            <button type="submit" class="btn btn-md  btn-danger original-button"><i class="glyphicon glyphicon-trash"></i> 削　除</button>
                                            {{Form::close()}}
                                        @endif
                                    </span>
                                    <div style="clear:both"></div>
                                </li>
                            @endforeach
                        </ul>
                        {!! $boards->render() !!}
                    @else
                        <h3 class="text-center alert alert-info">まだ掲示板がありません</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
