<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
    ];

    protected $table = "course_category";

    public function stream()
    {
        return $this->belongsTo(Stream::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function colleges()
    {
        return $this->belongsToMany(College::class, 'college_courses', 'course_id', 'college_id')
            ->withPivot('code', 'fee');
    }

    public function entranceExams()
    {
        return $this->hasMany(EntranceExam::class);
    }
}
