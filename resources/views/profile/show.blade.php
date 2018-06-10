@extends('layouts.app')

@section('content')
<div class="container">

    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="col"><h2>名前：{{$profile->name}}</h2></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="row">性別：{{$profile->sex or '未設定'}}</td>
            </tr>
            <tr>
                <td class="row">趣味：{{$profile->hobby or '未設定'}}</td>
            </tr>
            <tr>
                <td class="row">自己紹介:{{$profile->description or '未設定'}}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
