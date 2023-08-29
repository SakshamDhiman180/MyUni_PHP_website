<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollegeCourse extends Model
{
    use HasFactory;
   // protected $table = 'college_courses';
    //protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'college_id',
        'course_id',
        'code',
        'fee',
    ];

    // Define the relationship between CollegeCourse and Course
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    // Define the relationship between CollegeCourse and College
    public function college()
    {
        return $this->belongsTo(College::class, 'college_id');
    }
}
