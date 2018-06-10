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
                @if($chats->count())
                    <table class="table table-condensed table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">リスト</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($chats as $chat)
                                <tr>
                                    <td class="original-table-style">
                                        <span class="pull-left original-span-with">{{$chat->comment}}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h3 class="text-center alert alert-info">まだ掲示板がありません</h3>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection