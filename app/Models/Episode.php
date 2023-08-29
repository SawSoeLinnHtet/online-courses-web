<?php

namespace App\Models;

use FFMpeg\FFMpeg;
use FFMpeg\Coordinate\TimeCode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Episode extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function getAcsrVideoDurationAttribute()
    {
        
    }
}
