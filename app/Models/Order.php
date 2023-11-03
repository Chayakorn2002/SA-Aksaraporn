<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    // public function updateTotalPrice() : void
    // {
    //     $this->total_price = $this->products->sum(function (Product $product) {
    //         return $product->price * $product->pivot->quantity;
    //     });
    //     $this->save();
    // }

    public function updateTotalPrice()
    {
        $totalPrice = 0;

        // Reload the order items relationship to exclude deleted items
        $this->load('orderItems');

        // Filter out order items with a quantity of zero or less
        $filteredOrderItems = $this->orderItems->filter(function ($orderItem) {
            return $orderItem->quantity > 0;
        });

        foreach ($filteredOrderItems as $orderItem) {
            $totalPrice += $orderItem->product->product_price * $orderItem->quantity;
        }

        // Update the total_price attribute of the order
        $this->total_price = $totalPrice;
        $this->save();
    }
}
