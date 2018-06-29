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
                <td class="row" style="padding:20px 0;"><span class='text-right col-md-2 col-lg-2'>性　　別</span><span class="col-md-10 col-lg-10">{{$profile->sex or '未設定'}}</span></td>
            </tr>
            <tr>
                <td class="row" style="padding:20px 0;"><span class='text-right col-md-2 col-lg-2'>趣　　味</span><span class="col-md-10 col-lg-10">{{$profile->hobby or '未設定'}}</span></td>
            </tr>
            <tr>
                <td class="row" style="padding:20px 0;"><span class='text-right col-md-2 col-lg-2'>自己紹介</span><span class="col-md-10 col-lg-10">{{$profile->description or '未設定'}}</span></td>
            </tr>
        </tbody>
    </table>
    @if (user('id') == $profile->id)
        <a class="btn btn-md btn-success" href="{{route('profile.edit', user('id'))}}">マイページ編集</a>
    @endif
</div>
@endsection
