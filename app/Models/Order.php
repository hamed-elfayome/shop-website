<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Money\Currency;
use Money\Money;

class Order extends Model
{
    use HasFactory;

    public $casts = [
        'shipping_address' => 'collection',
    ];

    protected function amountTotal(): Attribute
    {
        return Attribute::make(
            get: fn (int $value) => new Money($value, new Currency('EGP')),
        );
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
