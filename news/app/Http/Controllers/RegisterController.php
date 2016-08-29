<?php
/**
 * Created by PhpStorm.
 * User: heycode
 * Date: 2016/8/26
 * Time: 13:38
 */

namespace App\Http\Controllers;


use App\Models\Admin;
use Request;

class RegisterController extends Controller{

    private $_Admin;

    public function __construct(){
        $this->_Admin = new Admin();
    }

    /**
     *  显示注册页面
     *
     */
    public function register(){
        return view('login/register');
    }


    /**
     *  用户注册处理
     *
     */
    public function addAdmin(){
        $username = Request::input('username') ? Request::input('username') : '';
        $password = Request::input('password') ? Request::input('password'): '';
        $repassword = Request::input('repassword') ? Request::input('repassword'): '';

        if($password != $repassword){
            return redirect('/register');
        }

        $adminModel = $this->_Admin;
        $nameHas = $adminModel->checkName($username);
        
        if($nameHas) {
            return redirect('/register');
        }

        $userData = ['username'=>$username, 'password'=>$password];
        $res = $adminModel->addAdmin($userData);
        if($res){
            return redirect('/login');
        }else{
            return redirect('/register');
        }

    }

}