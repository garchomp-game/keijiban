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
            </div>

            <div class="panel-body">
                @if($boards->count())
                    <table class="table table-condensed table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">リスト</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($boards as $board)
                                <tr>
                                    <td class="original-table-style">
                                        <div class="pull-right">
                                            <a class="btn btn-md btn-primary original-button" href="{{ route('boards.edit', $board->id) }}"><i class="glyphicon glyphicon-list"></i>　掲示板へ</i></a><br>
                                            @if ($board->user_id == auth()->user()->id)
                                                {{Form::open(['route' => ['boards.destroy', $board->id], 'class' => 'form_inline', 'onsubmit' => "return confirm('本当に消しますか？');"])}}
                                                <button type="submit" class="btn btn-md  btn-danger original-button"><i class="glyphicon glyphicon-trash"></i>　削　　除</button>
                                                {{Form::close()}}
                                            @endif
                                        </div>
                                        <strong class="pull-left original-span-with">{{$board->title}}</strong>
                                        <span class="pull-left original-span-with">{{$board->description}}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $boards->render() !!}
                @else
                    <h3 class="text-center alert alert-info">まだ掲示板がありません</h3>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
