@extends('layout')

@section('head')
    <style>
        main{
            align-items: center;
            display: flex;
            justify-content: center;
        }
        textarea{
            min-width: 400px;
            min-height: 400px;
        }
    </style>
@stop

@section('content')
    <main>
        <form action="problemJudge" method="post">
            <span>選擇語言</span><br>
            <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
            <input type="radio" name="language" value="cpp" /><span> C++ </span><br>
            <input type="radio" name="language" value="cpp11"/><span> C++11 </span><br>
            <span>程式碼</span><br>
            <textarea name="code"></textarea><br>
            <button class="btn btn-primary"> 提交 </button>
        </form>
    </main>
@stop
