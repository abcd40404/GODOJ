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
            min-width: 600px;
            line-height: 1.6em;
            font-size: 16px;
            font-weight: 500;
        }
    </style>
@stop

@section('content')
    <main>
        <div class="wrap container-fluid">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="table-content">題目</th>
                        <th class="table-content">語言</th>
                        <th class="table-content">用時</th>
                        <th class="table-content">記憶體</th>
                        <th class="table-content">結果</th>
                        <th class="table-content">提交時間</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($submissions as $submission)
                    <tr>
                        <td>{{$problem->title}}</td>
                        <td>{{$submission->lang}}</td>
                        <td>{{$submission->time}} sec</td>
                        <td>MB</td>
                        <td class="msg">{{$submission->result}}</td>
                        <td>{{$submission->mtime}}</td>
                    <tr>
                    @endforeach
                    <script>
                        var dmsg = $(".msg");

                        for(var i = 0; i < dmsg.length; i++){
                            var msg = dmsg[i].innerHTML;
                            if(msg.match('Accepted'))
                                dmsg[i].style.color = 'green';
                            else if (msg.match('Wrong Answer'))
                                dmsg[i].style.color = 'red';
                            else if(msg.match('Time Limit Exceeded'))
                                dmsg[i].style.color = '#0808FF';
                        }
                    </script>
                </tbody>
            </table>

        </div>

    </main>
@stop
