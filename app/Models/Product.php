<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'stock',

    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function orders() : BelongsToMany
    {
        return $this->belongsToMany(Order::class);
    }

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function images() : HasMany
    {
        return $this->hasMany(ImageCatalogue::class, 'product_id');
    }

    public function updateStock(int $quantity) : void
    {
        $this->stock -= $quantity;
        $this->save();
    }

    public function checkStockAndChangeStatus()
    {
        if ($this->product_stock < $this->product_minimum_quantity) {
            $this->product_status = 'unavailable';
            $this->save();
        } else if ($this->product_stock >= $this->product_minimum_quantity) {
            $this->product_status = 'available';
            $this->save();
        }
    }
}
