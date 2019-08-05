<?php

namespace App\Models;

use App\Model;

class Admin extends Model
{
    public const TABLE = 'admins';

    public $name;
    public $surname;
    public $email;
    public $password;
}
