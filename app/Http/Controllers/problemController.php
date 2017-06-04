<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Problem;

class problemController extends Controller
{
    public function judge($pid){
        $lang = $_POST['language'];
        if($lang = 'cpp')
            $lang = 'C++';
        else if($lang = 'cpp11')
            $lang = 'C++11';
        $prob = Problem::find($pid)->title;
        // print_r($_POST['name']);
        $code = $_POST['code'];
        $compileFIle = fopen("code/tmp.cpp", "w");
        fwrite($compileFIle, $code);
        fclose($compileFIle);
        $res =  shell_exec('g++ code/tmp.cpp -o code/tmp.out 2>&1 1> /dev/null');
        if(isset($res)){
            echo $res;
        }
        else{
            $str = 'code/tmp.out < code/testcase/' .$pid. '.in > code/tmp.ou';
            $res = shell_exec($str);
            // echo $str;

            $res = shell_exec('code/compare code/tmp.ou code/testcase/1.ou');
            if(isset($res)){
                $msg = "Wrong Answer";
            }
            else{
                $msg = "Accepted";
            }

        }
        return view('result', compact('prob', 'lang', 'msg'));
        // echo $code;
    }
}
