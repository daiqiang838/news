<?php

namespace App\Http\Controllers;

use Request, Lang, Session;
use App\Http\Requests;
use App\Models\Admin;

class LoginController extends Controller{
    private $_Admin;

    public function __construct(){
        $this->_Admin = new Admin();
    }


    public function index(){
        return view('/login/login');
    }

    public function login(){

        $username = Request::input('username')?Request::input('username'):'';
        $password = Request::input('password')?Request::input('password'):'';
        $admin = $this->_Admin;
        $loginOK = $admin->login($username,$password);

        if($loginOK){
            $adminInfo = ['username'=>$username, 'islogin'=>'1'];
            session($adminInfo);
            return redirect('/newsList');
        }
        //echo ">";
        return back();
    }



}
