<?php

namespace App\Models;

use FFMpeg\FFMpeg;
use Illuminate\Support\Str;
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

    public function getAcsrTitleLimitAttribute()
    {
        return Str::limit($this->title, 20);
    }

    public function getAcsrEpisodePrivacyAttribute()
    {
        if($this->privacy == 'public'){
            return asset('images/episodes/cover/' . $this->cover);
        }
        return asset('site/images/lock.png');
    }
}
