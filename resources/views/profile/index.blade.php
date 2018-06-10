@extends('layouts.app')

@section('content')
<div class="container">

    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="col"><h2>名前：{{user('name')}}</h2></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="row">性別：{{user('sex', '未設定')}}</td>
            </tr>
            <tr>
                <td class="row">趣味：{{user('hobby', '未設定')}}</td>
            </tr>
            <tr>
                <td class="row">自己紹介:{{user('description', '未設定')}}</td>
            </tr>
        </tbody>
    </table>
    <a class="btn btn-md btn-success" href="{{route('profile.edit', user('id'))}}">マイページ編集</a>
</div>
@endsection
