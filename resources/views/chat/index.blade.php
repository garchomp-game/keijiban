@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default original-chat-bord" id="ul_list">
            <div class="panel-body">
                <h2>{{$board->title}}</h2>
                <hr style="border: black solid 1px">
                <ul class="list-group">
                    @if($chats->count())
                        @foreach($chats as $chat)
                                <li class="list-group-item original-list-group-item list-group-item-action" id="msg_id{{$chat->id}}">
                                    {{-- TODO:モーダル表示 --}}
                                    {{-- <a class="original-chat-link-button" href="#user_modal" rel="modal:open"> --}}
                                    <a href="{{route('profile.show', $chat->user_id)}}" class="original-chat-link-button">
                                        <p style="margin:0;">{{$chat->user->name}}</p>
                                        <hr style="margin:10px 0;">
                                        <span class=" original-span-with original-comment-style">{{$chat->comment}}</span>
                                        <div style="clear:both"></div>
                                    </a>
                                    {{-- </a> --}}
                                </li>
                        @endforeach
                    @else
                        <li class="list-group-item">まだ投稿がありません</li>
                    @endif
                </ul>
            </div>
        </div>
        {{Form::open(['route' => 'chat.store', 'class' => 'form-group'])}}
            <p>コメント</p>
            <input type="hidden" name="boards_id" value="{{request()->chat}}">
            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
            <textarea class="form-control" name="comment" rows="6"></textarea>
            <input class="btn btn-md btn-primary pull-left" style="margin:10px 0" type="submit" name="submit" value="送信">
        {{Form::close()}}
        <a href="{{route('boards.index')}}" class="pull-right btn btn-md btn-success">一覧に戻る</a>
    </div>
</div>
{{-- TODO:モーダル表示 --}}
{{-- <div id="user_modal" class="modal">
  <p></p>
  <a href="#" rel="modal:close">Close</a>
</div> --}}

<script type="text/javascript">
    $(function() {
        $("#msg_id{{$chats->count()}}").click;
    })
</script>
@endsection
{{--
TODO:jqueryを使ったスクロール問題未解決。各liにidだけ割当
うまくスクロールできないのでもし解決法わかったらお願いしますm(_ _)m
 --}}
