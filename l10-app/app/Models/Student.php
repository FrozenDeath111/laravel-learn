<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name'];

    public function courses(): BelongsToMany {
        return $this->belongsToMany(Course::class);
    }

    // public function studinfo(): HasOne {
    //     return $this->hasOne(Studinfo::class, 'id');
    // }

    public function studinfo(): HasMany {
        return $this->hasMany(Studinfo::class, 'id');
    }
}
