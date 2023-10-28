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
        'product_name',
        'product_description',
        'product_price',
        'product_stock',
        'product_status',
        'images', // If you are storing images as an array
        'category_id',
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
}
