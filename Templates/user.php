<?php

require __DIR__ . '/autoload.php';


use App\Models\User;

//$data = User::FindAll();
$email = '12@mail.ru';
$name = 'Ush';
$data = (User::Ins($email, $name)) ? TRUE : FALSE;
$set = 'name = "Ushka1"';
$where = 'email = "12@mail.ru"';
//$data = (User::Upd($set, $where)) ? TRUE : FALSE;
$id = 1;
//$data = (User::FindById($id)) ? User::FindById($id) : FALSE;

/* echo
    '<form action="../App/AddFunc.php" method="post" enctype="multipart/form-data">
    <b>
        <p>Новый пользователь</p>
    </b>
    <textarea name="name" placeholder="имя" cols="120" wrap="hard" id=""></textarea>
    <br><br>
    <textarea name="email" placeholder="e-mail" cols="120" wrap="hard" id=""></textarea>
    <br>
    <button type="submit">Сохранить</button>
</form>'; */
