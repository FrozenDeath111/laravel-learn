<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name',
        'phone',
        'path',
        'date_of_birth',
    ];

    public function details(){
        return $this->hasOne(Detail::class);
    }

    public function jobs(){
        return $this->hasMany(Job::class);
    }
}
