<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Problem;

class pageController extends Controller
{
    public function getPage(){
        $type = $_POST['type'];
        $cid = DB::table('category')->select('id')->where('type', '=', $type)->get();
        //collection轉為array
        $cid = $cid->all();
        $problem = DB::table('problems')->where('cid', '=', $cid[0]->id)->get();
        echo json_encode($problem);
    }

    public function showProblem($pid){
        $problem = Problem::find($pid);
        return view('problem', compact('problem'));
    }

    public function submit($pid){
        return view('submit', compact('pid'));
    }
}
