@extends('layout')

@section('head')
    <style>
        main{
            align-items: center;
            display: flex;
            justify-content: center;
            height: 100vh;
            font-family: "source-han-sans-traditional", sans-serif;
        }
        .wrap{
            min-width: 500px;
            line-height: 1.6em;
            font-size: 16px;
            font-weight: 500;
            border: 1px solid black;
            border-radius: 4px;
        }
    </style>
@stop

@section('content')
    <main>
        <div class="wrap container-fluid">
            <div class="row">
                <div class="probtitle col-lg-4"> {{$prob}} </div>
                <div class="lang col-lg-4"> {{$lang}} </div>
                <div class="msg col-lg-4"> {{$msg}} </div>
                <script>
                    var dmsg = $(".msg");
                    var msg = dmsg.html();
                    console.log((msg == 'Accepted'));

                    if(msg.match('Accepted'))
                        dmsg.css('color', 'green');
                    else if (msg.match('Wrong Answer'))
                        dmsg.css('color', 'red');
                </script>
            </div>
        </div>

    </main>
@stop
