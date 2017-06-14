@extends('layout')

@section('head')
    <style>
        main{
            font-size: 20px;
            line-height: 1.6em;
        }
        .title{
            width: 50%;
            margin: 0px auto;
            text-align: center;
            margin-bottom: 5px;
        }
        .wrap{
            border: 2px solid #7b7878;
            border-radius: 4px;
            margin: 0px auto;
            width: 50%;
            min-height: 75vh;
        }
        #messages {
            list-style-type: none;
            margin: 0;
            padding: 0;
            min-height: 75vh;
        }
        #messages li { padding: 5px 10px; }
        #messages li:nth-child(odd) { background: #eee; }
        #m{
            border: 2px solid #7b7878;
            border-radius: 4px;
            margin: 5px;
            width: 85%;
        }
        .btn{

            line-height: 1.6em;
        }
    </style>
@stop
@section('content')
    <main>
        <h2 class="title"> Chat Room</h2>
        <div class="wrap">
            <ul id="messages"></ul>
            <form class="send" action="">
                <input id="m" autocomplete="off" /><button class="btn btn-primary">Send</button>
            </form>
        </div>
            <script src="https://cdn.socket.io/socket.io-1.4.5.js"></script>
            <!-- <script src="https://code.jquery.com/jquery-1.11.1.js"></script> -->
            <script>
                var name = '{{$user->name}}: ';
                $(function () {
                    var socket = io("http://localhost:3000");
                    $('form').submit(function(){
                        socket.emit('chat message', name + $('#m').val());
                        $('#m').val('');
                        return false;
                    });
                    socket.on('chat message', function(msg){
                        $('#messages').append($('<li>').text(msg));
                        //取得視窗高度
                        var height = $(".wrap").get(0).scrollHeight;
                        //滾軸移動
                        $(document).scrollTop(height);
                    });
                });
                // $(".btn").click(function(){
                //     $("ul").scrollTop(100);
                //     console.log($("ul").scrollTop());
                //     console.log("f");
                // });
            </script>
    </main>
@stop
