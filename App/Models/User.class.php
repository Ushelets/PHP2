<?php

namespace App\Models;

use App\Model;
use App\Db;

class User extends Model
{
    public const TABLE = 'users';
    public $email;
    public $name;
}
