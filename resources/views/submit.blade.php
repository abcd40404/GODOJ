@extends('layout');

@section('head')
    <style>
        .background{
            align-items: center;
            display: flex;
            justify-content: center;
            flex-direction: column;
        }
        textarea{
            min-width: 400px;
            min-height: 400px;
        }
    </style>
@stop

@section('content')
    <div class="main">
        <form action="problemJudge" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
            <input type="radio" name="language" value="cpp" /><span> C++ </span><br>
            <input type="radio" name="language" value="cpp11"/><span> C++11 </span><br>
            <textarea name="code"></textarea><br>
            <button class="btn btn-primary"> 提交 </button>
        </form>
    </div>
@stop
