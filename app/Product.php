<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $fillable = [
        'category_id', 'name', 'description', 'price', 'stock', 'photo'
    ];

    /**
     * Mendefinisikan relasi belongs-to ke model Category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
