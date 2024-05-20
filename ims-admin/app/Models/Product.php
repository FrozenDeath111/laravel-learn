<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name', 'category', 'description'];

    public function stock_in(){
        return $this->hasOne(ProductWarehouse::class,'product_id');
    }

}
