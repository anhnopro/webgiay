<?php

namespace App\Controllers\Client;

use App\Models\UserModel;

session_start();


class UserController extends BaseController
{
    public function showLogin()
    {
        $this->view('login/login', []);
    }

    public function login()
    {
        if (isset($_POST['btn_login'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $error = [];
            $flag = true;

            if ($email == "") {
                $flag = false;
                $error['email'] = "Bạn phải nhập email hợp lệ";
            }

            if ($password == "") {
                $flag = false;
                $error['password'] = "Bạn phải nhập mật khẩu";
            }

            if ($flag) {
                $user = UserModel::login($email, $password);
                if ($user) {
                    $_SESSION['user_id'] = $user['id_user'];
                    $_SESSION['user_nickname'] = $user['nick_name'];
                    $_SESSION['role']=$user['role'];
                    header('location:'.ROOT_PATH.'home');
                    exit();
                } else {
                    $error['login'] = "Email hoặc mật khẩu không đúng";
                    $this->view('login/login', compact('error'));
                }
            } else {
                $this->view('login/login', compact('error'));
            }
        }
    }

    public function logout()
    {
     
        session_unset();
        session_destroy();
        header('Location:'.ROOT_PATH."user/login");
        exit();
    }
    public function showRegister(){
        $this->view('login/register',[]);
    }
    public function register(){
        if(isset($_POST['btn_register'])){
            $data=[
           'nick_name'=>$_POST['nick_name'],
           'email'=>$_POST['email'],
           'phone_number'=>$_POST['phone_number'],
           'password'=>$_POST['password'],
           'role'=>1,
            ];
            UserModel::add($data);
            header('Location:'.ROOT_PATH."user/login");
            exit();
        }
       
    }
}
