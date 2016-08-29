<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model{
    public $timestamps = false;
    protected $fillable = ['username', 'password'];

    // 登陆
    public function login($username,$password){
        $username = trim($username);
        $password = trim($password);

        $adminlist = $this->where('username','=',$username)->first();
        if(!$adminlist){
            return false;
        }
        return $adminlist['password'] == md5(md5($password).'dev') ? true : false;
    }

    /**
     *  用户注册处理
     *
     */
    public function addAdmin(array $data){
        $data['password'] = md5(md5($data['password']).'dev');
        return $this->create($data);
    }

    // 检查用户名是否已经存在
    public function checkName($name){
        $res = $this->where('username',$name)->select('username')->first();
        return $res ? true : false;
    }



}
