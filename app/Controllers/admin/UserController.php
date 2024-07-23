<?php
namespace App\Controllers\Admin;

use App\Models\UserModel;

class UserController extends BaseController{
    public function listUser(){
        $users=UserModel::all();
        $this->view('user/listUser',compact('users'));
    }
}
?>