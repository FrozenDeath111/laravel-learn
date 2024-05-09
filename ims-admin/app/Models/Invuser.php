<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invuser extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['username', 'password', 'role'];

    // public function warehouse(){
    //     return $this->belongsTo(WarehouseStaff::class,'warehouse_id');
    // }

    public function warehouse(){
        return $this->hasOne(WarehouseStaff::class,'staff_id');
    }

    public function store(){
        return $this->hasOne(StoreStaff::class,'staff_id');
    }
}
