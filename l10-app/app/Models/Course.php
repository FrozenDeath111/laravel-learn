<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['course_name'];

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class);
    }

    public function detail(): HasMany
    {
        return $this->hasMany(Detail::class, 'selected_course_id');
    }
}
