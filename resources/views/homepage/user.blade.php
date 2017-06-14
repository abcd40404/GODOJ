@extends('layout')

@section('head')
    <style>
        main{
            height: 85vh;
        }

        .status, .history-submit{
            margin: 0 auto;
            margin-top: 20px;
            width: 600px;
        }

    </style>
@stop

@section('content')
    <main>
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
                            <td>{{App\Submission::whereIn('pid', App\Problem::where('cid', $category->id)->select('id')->get())->whereRaw('uid = '.$uid.' AND result = "Accepted"')->distinct('pid')->count('pid')
}}/{{App\Problem::where('cid', $category->id)->count()}}</td>
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
                <tbody>
                    @foreach($submissions as $submission)
                        <tr>
                            <td>{{App\Problem::find($submission->pid)->title}}</td>
                            <td>{{$submission->lang}} MB</td>
                            <td>{{$submission->time}} s</td>
                            <td>{{$submission->memory}}</td>
                            <td class="res">{{$submission->result}}</td>
                            <td>{{$submission->mtime}}</td>
                        </tr>
                    @endforeach
                    <script>
                        var dmsg = $(".res");

                        for(var i = 0; i < dmsg.length; i++){
                            var msg = dmsg[i].innerHTML;
                            if(msg.match('Accepted'))
                                dmsg[i].style.color = 'green';
                            else if (msg.match('Wrong Answer'))
                                dmsg[i].style.color = 'red';
                            else if(msg.match('Time Limit Exceeded'))
                                dmsg[i].style.color = '#0808FF';
                            else if(msg.match('Compilation Error'))
                                dmsg[i].style.color = '#868609';
                        }
                    </script>
                </tbody>
            </table>
        </div>
    </main>
@stop
