<?php
use App\Models\HasPriceInterface;
use App\Models\GiftCard;

require __DIR__ . '/autoload.php';
//declare (strict_types = 1); //объявлен строгий режими проверки типов

function Buy(HasPriceInterface $item)
{
    var_dump($item);
}

$item = new GiftCard();
Buy($item);
