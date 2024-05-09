<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['employee_id', 'details'] ;

    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
