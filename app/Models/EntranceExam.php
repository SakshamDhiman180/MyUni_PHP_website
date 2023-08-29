<?php

namespace App\Models;

use Dotenv\Parser\Entry;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntranceExam extends Model
{
    use HasFactory;

    protected $fillable = [
        'admission_year',
        'name',
        'description',
        'code',
        'course_id',
        'exam_date',
        'registration_start_date',
        'reg_last_date',
        'fee',
        'result_date' ,
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function college()
    {
        return $this->belongsTo(College::class, 'college_id');
    }

}
