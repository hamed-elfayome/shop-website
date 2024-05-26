<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Money\Currency;
use Money\Money;

class OrderItem extends Model
{
    use HasFactory;

    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn (int $value) => new Money($value, new Currency('EGP')),
        );
    }

    protected function amountTotal(): Attribute
    {
        return Attribute::make(
            get: fn (int $value) => new Money($value, new Currency('EGP')),
        );
    }


}
