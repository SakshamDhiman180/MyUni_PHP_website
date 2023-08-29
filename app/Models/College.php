<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'description',
        'streams',
        'code',
        'address',
        'city',
        'state',
        'zip' ,
        'contact_number',
        'email',
        'principal_name'
    ];
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'college_courses', 'college_id', 'course_id')
            ->withPivot('code', 'fee');
    }

    public function exam()
    {
        return $this->belongsTo(EntranceExam::class, 'id');
    }
}
