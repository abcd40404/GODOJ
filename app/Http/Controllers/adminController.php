<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\User;

class adminController extends Controller
{
    public function edit(){
        $uid = $_GET['uid'];
        $user = User::find($uid);
        return view('homepage.edit', compact('user'));
    }

    public function updateAccount(){
        $uid = $_POST['id'];
        if($_POST['usertype'] == '管理員')
            $usertype = 1;
        else if($_POST['usertype'] == '作者')
            $usertype = 2;
        else if($_POST['usertype'] == '使用者')
            $usertype = 3;
        User::where('id', $uid)
            ->update(['name' => $_POST['name'], 'email' => $_POST['email'], 'password' => bcrypt($_POST['password']), 'usertype' => $usertype]);
        return redirect('about/accounts');
    }
    // call by ajax
    public function deleteAccount(){
        $user = User::find($_GET['uid']);
        $user->delete();
    }
}
