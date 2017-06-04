<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class problemController extends Controller
{
    public function judge($pid){
        echo $_POST['language'];
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
                echo "Wrong Answer";
            }
            else{
                echo "Accepted";
            }

        }
        // echo $code;
    }
}
