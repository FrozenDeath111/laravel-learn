<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Studinfo extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['phone'];

    // public function student(): BelongsTo {
    //     return $this->belongsTo(Student::class, 'id');
    // }
}
