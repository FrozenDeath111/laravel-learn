<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStore extends Model
{
    use HasFactory;
    public $table = "product_store";
    public $timestamps = false;
    protected $fillable = ['product_id', 'store_id', 'in_stock', 'sale_stock'];
    protected $attributes = [
        'warehouse_stock' => 0,
    ];
}
