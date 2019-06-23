<?php
namespace App\Models;

use App\Model; // оператор use - только для более короткой формы записи класса

//class GiftCard extends Model implements OrderableInterface
class GiftCard extends Model implements HasPriceInterface, HasWeightInterface //непосредственно от множества классов у класса нет наследования, но есть от множества интерфейсов
{
    public const TABLE = 'cards';

    use HasPriceTrait;
};
