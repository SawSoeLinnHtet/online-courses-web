<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'instructor_id',
        'description',
        'summary'
    ];

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
        return $this->hasMany(Course::class);
    }
}
