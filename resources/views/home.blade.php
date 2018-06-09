@extends('layouts.app')

@section('content')
    <div class="container">
        <ul class="list-group original_home_ul_group">
            <li class="list-group-item"><a class="original_link_button" href="{{route('profile.index')}}">プロフィール</a></li>
            <li class="list-group-item"><a class="original_link_button" href="{{route('boards.index')}}">掲示板一覧へ</a></li>
        </ul>
    </div>
@endsection
