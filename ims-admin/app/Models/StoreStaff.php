<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreStaff extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "store_staffs";
    protected $fillable = ['store_id', 'staff_id'] ;
}
