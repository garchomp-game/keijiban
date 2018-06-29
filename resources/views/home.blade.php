@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- <div class="pull-left col-md-9 col-lg-9"> --}}
            <h2 class='text-center' style="margin-bottom:100px;">掲示板サイトへようこそ！</h2>
            {{Form::open(['route' => 'boards.index', 'method' => 'get', 'class' => 'form-group'])}}
            <!-- Search form -->
            <div class="md-form" style="margin-bottom:10px;">
                <div class="col-md-7"></div>
                <input class="col-md-4" type="text" name="search_text" placeholder="検索" aria-label="検索">
            </div>
            <button type="submit" name="submit" class="col-md-1 btn-success"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
            {{Form::close()}}
            <div style="clear:both;margin-bottom:30px">

            </div>
            <h3>新着部屋一覧</h3>
            @if($boards->count())
                <ul class="list-group">
                    @foreach($boards as $board)
                        <a class="list-group-item" href="{{route('boards.show', $board->id)}};">
                            <h3 class="pull-left" style="display:block; margin:0 0 10px;">{{$board->title}}</h3>
                            <div style="clear:both"></div>
                            <span class="pull-left original-span-with" style="float:left;">{{$board->description}}</span><br>
                            <div style="clear:both"></div>
                            <div style="clear:both"></div>
                        </a>
                    @endforeach
                </ul>
                {!! $boards->render() !!}
            @else
                <h3 class="text-center alert alert-info">まだ掲示板がありません</h3>
            @endif
        {{-- </div> --}}
        {{-- <div class="pull-right col-md-3 col-lg-3 bg-success">
            <p>ここにsnsやお知らせなどを設置する…予定長文長文長文長文長文長文長文長文長文長文長文長文長文長文長文長文長文長文長文長文長文長文長文長文</p>
        </div> --}}
    </div>
@endsection
