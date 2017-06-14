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
        .manage, .problem{
            width: 200px;
            height: 200px;
            margin-left: 50px;
        }
        .manage:hover, .problem:hover{
            cursor: pointer;
            background-color: #4e4e4e;
            border-radius: 4px;
        }

    </style>
    <script>
        $(document).ready(function(){
            $(".manage").click(function(){
                location.href = "about/accounts";
            });
            $(".problem").click(function(){
                location.href = "about/addProblem";
            });
        });
    </script>
@stop

@section('content')
    <main>
        <div class="tool">
            <div class="manage"><img src="/img/ACCOUNTMANAGE.png"></div>
            <div class="problem"><img src="/img/PROBLEMMANAGE.png"></div>
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
                            <td>{{App\Problem::find($submission->pid)->title}}</td>
                            <td>{{$submission->lang}}</td>
                            <td>{{$submission->time}} s</td>
                            <td>{{$submission->memory}} MB</td>
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
