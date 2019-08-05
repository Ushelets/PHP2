<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Admin;
use App\Models\Author;
use App\Models\User;

class index_admin_controller extends Controller
{
    protected function access()
    {
        if ($_SESSION['repeat'] == 1) {
            $data = Admin::FindAll();
            foreach ($data as $value) {
                if (password_verify($_SESSION['psw_adm'], $value->password)) {
                    return  true;
                }
            }
        } else {
            return true;
        }
    }

    protected function handle()
    {
        $data_usr = User::FindAll();
        $data_auth = Author::FindAll();

        foreach ($data_usr as $value) {
            $admins_usr[] = ['id' => $value->id, 'name' => $value->name, 'surname' => $value->surname, 'email' => $value->email, 'password' => $value->password];
        }
        foreach ($data_auth as $value) {
            $admins_auth[] = ['id' => $value->id, 'name' => $value->name, 'surname' => $value->surname, 'email' => $value->email, 'password' => $value->password];
        }
        $_SESSION['admins_usr'] = $admins_usr;
        $_SESSION['admins_auth'] = $admins_auth;

        $_SESSION['repeat'] = 0;
        $_SESSION['psw_adm'] = 0;

        $this->view->admins_usr = $data_usr; //вместо  $view->assign('articles', $data);
        $this->view->admins_auth = $data_auth; //вместо  $view->assign('articles', $data);

        $this->view->display(dirname(__DIR__, 2) . '/Templates/admin.php');
    }
}
