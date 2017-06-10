<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Problem;
use App\Category;

class pageController extends Controller
{
    public function getHomePage(){
        $user = Auth::user();
        $categories = Category::all();
        if($user->usertype == 1){
            return view("homepage.admin", compact('categories'));
        }
        else if($user->usertype == 3){
            return view("homepage.user", compact('categories'));
        }
        // return view("home");
    }
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
