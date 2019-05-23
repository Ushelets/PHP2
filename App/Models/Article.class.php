<?php

namespace App\Models;

use App\Model;
use App\Db;

class Article extends Model
{
    public const TABLE = 'news';
    public $title;
    public $content;
}
