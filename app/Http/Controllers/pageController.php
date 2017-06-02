<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageController extends Controller
{
    public function getPage(){
        $type = $_POST['type'];
        $problem = DB::table('problem')->where('type', '=', $type)->get();
        echo $problem;
    }
}
