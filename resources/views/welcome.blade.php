@extends('layout')

@section('head')
    <style>
        .news{
            width: 50%;
            margin: 0px auto;
            text-align: center;
            margin-bottom: 10px;
        }
        .table{
            width: 800px;
            height: 600px;
            margin: 0px auto;
        }
        .content{
            width: 100%;
            align-items: center;
            display: flex;
            justify-content: center;
        }
        .prob-category, .about{
            border: 1px solid black;
            border-radius: 4px;
            width: 200px;
            height: 200px;
            margin-top: 200px;
            margin-left: 30px;
        }
        .prob-category:hover, .about:hover{
            cursor: pointer;
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
    });
    </script>
@stop

@section('content')

    <main>
        <h2 class="news"> News </h2>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th> 等級 </th>
                    <th> 主題 </th>
                    <th> 發佈時間 </th>
                </tr>
            </thead>
        </table>
        <div class="content">
            <div class="prob-category">
                <span>分類題庫</span>
            </div>
            <div class="about">
                <span>關於我</span>
            </div>
        </div>
    </main>

@stop
