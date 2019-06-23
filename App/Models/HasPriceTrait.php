<?php

namespace App\Models;

trait HasPriceTrait
{
    protected $price;
    public function GetPrice()
    {
        return $this->price;
    }
}
