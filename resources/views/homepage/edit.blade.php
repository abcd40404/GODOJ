@extends('layout')

@section('head')
    <style>
        main{
            font-size: 20px;
            align-items: center;
            display: flex;
            justify-content: center;
        }
        .account{
            margin: 10px;
        }
        .btn{
            margin-top: 10px;
        }
    </style>
@stop

@section('content')
    <main>
        <form name="account" method="POST" class="account" action="updateAccount">
            <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
            <input type="hidden" name="id" value="{{$user->id}}">
            <span>帳號</span><br>
            <input type="text" name="name" value="{{$user->name}}"></input><br>
            <span>email</span><br>
            <input type="text" name="email" value="{{$user->email}}"></input><br>
            <span>密碼</span><br>
            <input type="text" name="password"></input><br>
            <span>帳號型態</span><br>
            <input name="usertype" list="usertype" placeholder="請選擇類型"/>
            <datalist id="usertype">
                <option label="管理員" value="管理員"/>
                <option label="作者" value="作者"/>
                <option label="使用者" value="使用者"/>
            </datalist><br>
            <button type="submit" class="btn btn-primary"> 送出 </button>
        </form>
    </main>
@stop
