<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'dob',
        'address',
        'phone',
        'profile',
        'gender',
        'bio',
        'links'
    ];

    protected $hidden = [
        'password'
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
    
    // public function setLinkToJsonAttribute($value)
    // {
    //    $this->attributes['links'] = json_decode($value);
    // }

    public function Course()
    {
        return $this->hasMany(Course::class);
    }

    public function getAcsrProfileAttribute()
    {
        if (isset($this->profile)) {
            return asset('images/instructors/' . $this->profile);
        }
        return `https://i.pravatar.cc/150?img={{ $this->Instructor->id }}`;
    }
}
