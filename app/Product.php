<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'id', 'product_name', 'quantity'
    ];
    public function purchased()
    {
        return $this->hasMany(Purchase::class);
    }
}
