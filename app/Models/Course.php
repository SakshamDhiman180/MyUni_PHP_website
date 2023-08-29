<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'description',
        'stream_id',
        'category_code'
    ];

    public function stream()
    {
        return $this->belongsTo(Stream::class);
    }

    public function category()
    {
        return $this->belongsTo(CourseCategory::class, 'category_code');
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
