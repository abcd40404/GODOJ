@extends('layout')

@section('head')
    <style>

        /*header{
            height: 15vh;
        }*/
        main{
            height: 85vh;
        }
        .status, .history-submit{
            border: 1px solid black;
            border-radius: 4px;
            width: 600px;
            min-height: 400px;
            margin-top: 10px;
        }
    </style>
@stop

@section('content')
    <main>
        <div class="manage">帳號管理</div>
        <div class="problem">題目管理<a href="about/addProblem">GO</a></div>
        <div class="status">解題狀況</div>
        <div class="history-submit">Submission</div>
    </main>
@stop
