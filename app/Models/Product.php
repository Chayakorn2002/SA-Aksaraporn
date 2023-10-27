<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    public function orders() : BelongsToMany
    {
        return $this->belongsToMany(Order::class);
    }

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
