<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseStaff extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "warehouse_staffs";
    protected $fillable = ['warehouse_id', 'staff_id'] ;

    // public function staff(){
    //     return $this->hasMany(Invuser::class,'staff_id','id');
    // }
}
