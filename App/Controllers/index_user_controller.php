<?php

namespace App\Controllers;

use App\Controller;
use App\Models\User;


class index_user_controller extends Controller
{
    protected function access()
    {
        if ($_SESSION['repeat'] == 1) {
            $data = User::FindAll();
            foreach ($data as $value) {
                //if (password_verify($_SESSION['psw_usr'], $value->password)) {
                if (password_verify($_POST['password_repeat'], $value->password)) {
                    return  true;
                }
            }
        } else {
            return true;
        }
    }

    protected function handle()
    {
        $data = User::FindAll();

        foreach ($data as $value) {
            $users[] = ['id' => $value->id, 'name' => $value->name, 'surname' => $value->surname, 'email' => $value->email, 'password' => $value->password];
        }
        $_SESSION['users'] = $users;

        $_SESSION['repeat'] = 0;
        $_SESSION['psw_usr'] = 0;

        $this->view->users = $data; //вместо  $view->assign('articles', $data);

        $this->view->display(dirname(__DIR__, 2) . '/Templates/user.php');
    }
}
