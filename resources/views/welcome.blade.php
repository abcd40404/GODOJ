@extends('layout')

@section('head')
    <link rel="stylesheet" href="css/welcome.css" type="text/css">
@stop

@section('content')

    <div class="main">
        <div class="news">
            <h1>News</h1>
            <p>hello</p>
        </div>
        <div class="prob-category">
            <h1>分類題庫</h1>
            <a href="{{ url('/probCategory') }}">
                GO
                <!-- 這邊插入圖片 -->
            </a>
        </div>
    </div>

@stop
