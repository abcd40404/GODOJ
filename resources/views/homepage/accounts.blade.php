@extends('layout')

@section('head')
    <style>
        .wrap{
            width: 50%;
            margin: 0px auto;
        }
        .fa{
            margin-left: 5px;
        }
        .fa-pencil-square-o:hover{
            cursor: pointer;
            color: green;
        }
        .fa-trash:hover{
            cursor: pointer;
            color:red;
        }
    </style>
    <script>
        $(document).ready(function(){
            $(".fa-pencil-square-o").click(function(){
                var uid = $(this).parent().parent()[0].id;
                location.href = "accounts/edit?uid=" + uid;
            });
            $(".fa-trash").click(function(){
                var user = $(this).parent().parent()[0];
                var uid = user.id;
                $.ajax({
                    type: "GET",
                    url: 'accounts/deleteAccount',
                    data: { uid : uid},
                    success(data){
                        user.remove();
                        alert("刪除成功");
                    }
                });
            });
        });
    </script>
@stop

@section('content')
    <main>
        <div class="wrap">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="table-content">帳號</th>
                        <th class="table-content">email</th>
                        <th class="table-content">操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr id="{{$user->id}}">
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@stop
