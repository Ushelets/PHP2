<?php

namespace App\Models;

interface OrderableInterface extends HasPriceInterface, HasWeightInterface
{
    public function GetTitle();
};
