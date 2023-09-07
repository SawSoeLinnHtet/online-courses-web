<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function Category()
    {
        return $this->belongsToMany(Category::class);
    }

    public function Episode()
    {
        return $this->hasMany(Course::class, 'id');
    }

    public function getAcsrCourseCoverAttribute()
    {
        if(isset($this->cover_photo)) {
            return asset('storage/images/courses/cover/'.$this->cover_photo);
        }
        return asset('site/images/course/cu-1.jpg');
    }
}
