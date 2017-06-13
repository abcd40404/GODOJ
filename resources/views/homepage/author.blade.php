@extends('layout')

@section('head')
    <style>
        main{
            height: 85vh;
        }
        .tool{
            width: 100%;
            align-items: center;
            display: flex;
            justify-content: center;
        }
        .status, .history-submit{
            margin: 0 auto;
            margin-top: 20px;
            width: 600px;
        }
        .problem{
            border: 1px solid black;
            border-radius: 4px;
            width: 200px;
            height: 200px;
            margin-left: 50px;
        }
        .problem:hover{
            cursor: pointer;
            background-color: green;
        }

    </style>
    <script>
        $(document).ready(function(){
            $(".problem").click(function(){
                location.href = "about/addProblem";
            });
        });
    </script>
@stop

@section('content')
    <main>
        <div class="tool">
            <div class="problem">題目管理</div>
        </div>
        <div class="status">
            <span>解題狀況</span>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="table-content">類型</th>
                        <th class="table-content">狀況</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->type}}</td>
                            <td>0</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="history-submit">
            <span>Submission</span>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="table-content">題目</th>
                        <th class="table-content">用時</th>
                        <th class="table-content">記憶體</th>
                        <th class="table-content">結果</th>
                        <th class="table-content">提交時間</th>
                    </tr>
                </thead>
            </table>
        </div>
    </main>
@stop
