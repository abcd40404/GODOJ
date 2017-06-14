<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Problem;
use App\Category;
use App\Submission;
use Carbon\Carbon;

class problemController extends Controller
{
    public function judge($pid){
        $lang = $_POST['language'];
        if($lang == 'cpp')
            $lang = 'C++';
        else if($lang == 'cpp11')
            $lang = 'C++11';
        $prob = Problem::find($pid)->title;
        // print_r($_POST['name']);
        $code = $_POST['code'];
        $compileFIle = fopen("code/tmp.cpp", "w");
        fwrite($compileFIle, $code);
        fclose($compileFIle);
        $res =  shell_exec('g++ code/tmp.cpp -o code/tmp.out 2>&1 1> /dev/null');
        if(isset($res)){
            // echo $res;
            $msg = "Compilation Error";
            $time = 0;
        }
        else{
            $str = 'code/Testbox ' .$pid. '.in';
            $res = shell_exec($str);
            if($res == 'TLE'){
                $msg = 'Time Limit Exceeded';
                $time = 1;
            }
            else{
                $time = $res;
                $res = shell_exec('code/compare code/tmp.ou code/testcase/1.ou');
                if(isset($res)){
                    $msg = "Wrong Answer";
                }
                else{
                    $msg = "Accepted";
                }
            }

        }
        // echo $res;
        $Submission = new Submission;
        $Submission->pid = $pid;
        $Submission->uid = Auth::user()->id;
        $Submission->lang = $lang;
        $Submission->time = doubleval($time);
        $Submission->memory = 1;
        $Submission->result = $msg;
        $Submission->mtime = Carbon::now('Asia/Taipei');
        $Submission->save();
        return redirect('problem/'.$pid.'/result');
    }

    function insertProblem(){
        $uid = Auth::user()->id;
        $cid = Category::where('type', $_POST['category'])->first()->id;
        $Problem = new Problem;
        $Problem->contest = 1;
        $Problem->uid = $uid;
        $Problem->cid = $cid;
        $Problem->title = $_POST['title'];
        $Problem->time = $_POST['time'];
        $Problem->memory = $_POST['memory'];
        $Problem->content = $_POST['content'];
        $Problem->inp_spec = $_POST['inp_spec'];
        $Problem->out_spec = $_POST['out_spec'];
        $Problem->mtime = Carbon::now('Asia/Taipei');
        $Problem->save();
        return redirect('about');
    }

    function result($pid){
        $uid = Auth::user()->id;
        $problem = Problem::find($pid);
        $submissions = Submission::whereRaw('pid='.$pid.' AND uid='.$uid)->orderBy('mtime', 'desc')->get();
        return view('result', compact('problem', 'submissions'));
    }
}
