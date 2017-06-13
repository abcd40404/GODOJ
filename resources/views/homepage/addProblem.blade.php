@extends('layout')

@section('head')
    <style>
        main{
            font-size: 20px;
        }
        input, textarea{
            border: 1px solid rgb(169, 169, 169);
            border-radius: 4px;
        }
        .title{
            width: 50%;
            margin: 0px auto;
            text-align: center;
            margin-bottom: 10px;
        }
        .problem{
            margin-left: 20px;
        }
        .content{
            width: 400px;
            height: 200px;
        }
        .inp_spec, .out_spec{
            width: 400px;
        }
    </style>
@stop

@section('content')
    <main>
        <h2 class="title"> 新增題目 </h2>
        <form name="problem" method="POST" class="problem" action="insertProblem">
            <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
            <span>題目類型</span><br>
            <input name="category" list="category" placeholder="請選擇類型"/>
            <datalist id="category">
                @foreach($categories as $category)
                <option label="{{$category->type}}" value="{{$category->type}}"/>
                @endforeach
            </datalist><br>
            <span>標題</span><br>
            <input type="text" name="title"></input><br>
            <span>時間限制</span><br>
            <input type="text" name="time"></input><br>
            <span>記憶體限制</span><br>
            <input type="text" name="memory"></input><br>
            <span>題目敘述</span><br>
            <textarea name="content" class="content"></textarea><br>
            <span>輸入規範</span><br>
            <textarea name="inp_spec" class="inp_spec"></textarea><br>
            <span>輸出規範</span><br>
            <textarea name="out_spec" class="out_spec"></textarea><br>
            <button type="submit" class="btn btn-primary"> 送出 </button>
        </form>
    </main>

@stop
