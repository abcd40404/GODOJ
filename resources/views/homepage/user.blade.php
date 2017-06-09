@extends('layout')

@section('head')
    <style>
        header{
            height: 15vh;
        }
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
        <div class="status">解題狀況</div>
        <div class="history-submit">Submission</div>
    </main>
@stop
