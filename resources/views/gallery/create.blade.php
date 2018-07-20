@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>ギャラリー追加</h2>
        {{Form::open(['route' => ['gallery.store', $user->id], 'enctype' => "multipart/form-data" ,'class' => 'form-group'])}}
        <input type="hidden" name="user_id" value="{{user('id')}}">
        <p>タイトル</p>
        @if($errors->first('title'))
            <p style="color:red;font-weight:bold;">{{$errors->first('title')}}<br></p>
        @endif
        <input type="text" style="margin:10px auto;" placeholder="タイトル" name="title" value="{{request('title')}}" class='form-control'>
        <hr style="border:1px solid #999;">
        <p>説明</p>
        @if($errors->first('description'))
            <p style="color:red;font-weight:bold;">{{$errors->first('description')}}<br></p>
        @endif
        <textarea name="description" class='form-control' style="margin:10px auto;" placeholder="説明">
            {{request('description')}}
        </textarea>
        <hr style="border:1px solid #999;">
        <p>コンテンツタイプ</p>
        @if($errors->first('content_type'))
            <p style="color:red;font-weight:bold;">{{$errors->first('content_type')}}<br></p>
        @endif
        <div data-toggle="buttons" class="text-center">
            <label class="btn btn-warning original-gallery-radio-check" for="image" style="width:49%; margin:5px 0px; display:block;padding:10px 5px;float:left;"><input autocomplete="off"type="radio" name="content_type" value="image" id="image">画像</label>
            <label class="btn btn-warning original-gallery-radio-check" for="text" style="width:49%; margin:5px 0px; display:block;padding:10px 5px;float:right;"><input autocomplete="off"type="radio" name="content_type" value="text" id="text">文章</label>
        </div>
        <div style="clear:both;"></div>
        @if($errors->first('content_description'))
            <p style="color:red;font-weight:bold;">{{$errors->first('content_description')}}<br></p>
        @endif
        <hr style="border:1px solid #999;">
        <p>コンテンツ内容</p>
        <div id="content-set">

        </div>
        <hr style="border:1px solid #999;">
        <input type="submit" style="margin-top:50px;width:100%;" name="submit" class="btn-lg btn-success" value="送信">
        {{Form::close()}}
    </div>
@endsection
