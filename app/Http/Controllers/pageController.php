<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class pageController extends Controller
{
    public function getPage(){
        $type = $_POST['type'];
        $cid = DB::table('category')->select('id')->where('type', '=', $type)->get();
        //collection轉為array
        $cid = $cid->all();
        $problem = DB::table('problem')->where('cid', '=', $cid[0]->id)->get();
        echo json_encode($problem);
    }
}
