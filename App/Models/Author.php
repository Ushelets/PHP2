<?php

namespace App\Models;

use App\Model;

class Author extends Model
{
    public const TABLE = 'authors';

    public $name;
    public $surname;
    public $email;
    public $password;
}
