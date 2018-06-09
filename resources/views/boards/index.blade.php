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
                    <table class="table table-condensed table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">タイトル</th>

                                <th class="text-right">詳細</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($boards as $board)
                                <tr>
                                    <td class="text-center"><strong>{{$board->id}}</strong></td>



                                    <td class="text-right">
                                        <a class="btn btn-xs btn-primary" href="{{ route('boards.show', $board->id) }}">
                                            <i class="glyphicon glyphicon-eye-open"></i>
                                        </a>

                                        <a class="btn btn-xs btn-warning" href="{{ route('boards.edit', $board->id) }}">
                                            <i class="glyphicon glyphicon-edit"></i>
                                        </a>
                                        {{Form::open(['route' => ['boards.destroy', $board->id], 'class' => 'form_inline', 'onsubmit' => "return confirm('本当に消しますか？');"])}}

                                            <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> </button>
                                        {{Form::close()}}
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
