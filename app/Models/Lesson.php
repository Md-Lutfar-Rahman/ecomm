<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'details',
        'course_name',
        'image',
        'video_link'
        
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
