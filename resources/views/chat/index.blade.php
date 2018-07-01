@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <h2 class="pull-left" style="margin:7px 0; font-size:36px; font-weight: bold;">{{$board->title}}</h2>
            @guest
                {{Form::open(['route' => 'chat.store', 'class' => 'form-group'])}}
                @if ($errors->first('comment'))
                    <p style="color:red;">{{$errors->first('comment')}}</p>
                @endif
                <input type="hidden" name="boards_id" value="{{request()->chat}}">
                <div style="clear:both"></div>
                <span class="pull-left" style="font-size:24px; margin:15px; margin-left:0;">名前：</span>
                <input type="text" name="name" class="pull-left form-control" style="margin:15px; width:40%;" value="">
                <div style="clear:both"></div>
                <p style="font-size:24px;">コメント：</p>
                <textarea class="form-control" name="comment" rows="6"></textarea>
                <input class="btn btn-primary pull-left" style="margin:10px 0; font-size:24px; padding:5px 30px;" type="submit" name="submit" value="送信">
                {{Form::close()}}
            @else
                @if ($board->user_id == auth()->user()->id)
                    <a class="btn btn-md pull-right btn-danger" href="javascript:delete.submit();" style="margin:10px 0; margin-left:10px;"><i class="glyphicon glyphicon-trash"></i> 削　除</a>
                    <a class="btn btn-warning pull-right btn-md" style="margin:10px 0;" href="{{route('boards.edit', $board->id)}}"><i class="glyphicon glyphicon-pencil"></i> 編　集</a>
                @endif
                <div style="clear:both"></div>
                <hr style="border:1px solid black; margin:3px 0 15px;">
                {{Form::open(['route' => ['boards.destroy', $board->id], 'name' => 'delete'])}}
                {{Form::close()}}
                {{Form::open(['route' => 'chat.store', 'class' => 'form-group'])}}
                @if ($errors->first('comment'))
                    <p style="color:red;">{{$errors->first('comment')}}</p>
                @endif
                <input type="hidden" name="boards_id" value="{{request()->chat}}">
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                <textarea class="form-control" name="comment" rows="6"></textarea>
                <input class="btn btn-primary" style="margin:10px auto; display:block; width:300px; font-size:24px; padding:5px 30px;" type="submit" name="submit" value="送信">
                {{Form::close()}}
            @endguest
            <div style="clear:both"></div>
            <ul class="original_class_chat_ul">
                @if($chats->count())
                    @foreach($chats as $chat)
                        <li class=" original-list-group-item list-group-item-action" id="msg_id{{$chat->id}}">
                            {{-- TODO:モーダル表示 --}}
                            {{-- <a class="original-chat-link-button" href="#user_modal" rel="modal:open"> --}}
                            <a href="{{route('profile.show', $chat->user_id)}}" class="original-chat-link-button">
                                <p style="margin:0;">{{$chat->user->name}}</p>
                                <hr style="margin:10px 0;">
                                <span class=" original-span-with original-comment-style pull-left">{{$chat->comment}}</span>
                                {{Form::open(['route' => ['chat.destroy', $chat->id], 'method' => 'delete', 'name' => "destroy{$chat->id}"])}}
                                <a class="btn btn-danger pull-right" href="javascript:destroy{{$chat->id}}.submit()">削除</a>
                                {{Form::close()}}
                                <div style="clear:both"></div>
                            </a>
                            {{-- </a> --}}
                        </li>
                    @endforeach
                @else
                    <li class="">まだ投稿がありません</li>
                @endif
            </ul>
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
