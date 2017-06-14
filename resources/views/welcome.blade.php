@extends('layout')

@section('head')
    <style>
        .title{
            width: 50%;
            margin: 0px auto;
            text-align: center;
            margin-bottom: 10px;
        }
        .news{
            width: 800px;
            min-height: 300px;
            margin: 0px auto;
        }

        .content{
            width: 100%;
            align-items: center;
            display: flex;
            justify-content: center;
        }
        .prob-category:hover, .about:hover, .chat:hover{
            cursor: pointer;
            background-color: #4e4e4e;
            border-radius: 4px;
        }
    </style>
    <script>
    $(document).ready(function(){
        $(".prob-category").click(function(){
            location.href = "/probCategory";
        });
        $(".about").click(function(){
            location.href = "/about";
        });
        $(".chat").click(function(){
            location.href = "/chat";
        });
    });

    </script>
@stop

@section('content')

    <main>
        <h2 class="title"> News </h2>
        <div class="news">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th> 等級 </th>
                        <th> 主題 </th>
                        <th> 發佈時間 </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($news as $new)
                        <tr>
                            <td>{{$new->level}}</td>
                            <td>{{$new->title}}</td>
                            <td>{{$new->mtime}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="content">
            <div class="prob-category">
                <img src="/img/PROBLEMSET.png">
            </div>
            <div class="about">
                <img src="/img/ABOUTME.png">
            </div>
            <div class="chat">
                <img src="/img/CHATROOM.png">
            </div>
        </div>
    </main>

@stop
