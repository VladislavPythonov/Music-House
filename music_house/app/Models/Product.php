<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    public function categories(): HasOne
    {
        return $this->hasOne(Category::class);
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class)->withPivot('qty');
    }

    protected $fillable = [
        'category_id',
        'title',
        'img_path',
        'price',
        'qty',
        'country',
        'year',
        'model',
        'description',
    ];
}
