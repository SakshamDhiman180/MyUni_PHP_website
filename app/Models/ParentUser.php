<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\Parent\VerifyEmail;
use App\Notifications\Parent\ResetPassword;
use App\Traits\HasStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Auth;

class ParentUser extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasStatus;

    protected $table = "parents";

    protected $guarded = ['id'];

    protected $appends = ['full_name'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) =>
            $attributes['first_name'] . " " . $attributes['last_name']
        );
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail());
    }

    public function markEmailAsVerified()
    {
        return $this->forceFill([
            'email_verified_at' => $this->freshTimestamp(),
            'status' => config('constants.status.active')
        ])->save();
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    // Define the relationship between CollegeCourse and College
    public function college()
    {
        return $this->belongsTo(College::class, 'college_id');
    }

    public function exam()
    {
        return $this->belongsTo(EntranceExam::class, 'exam_id');
    }
    public function entranceExams()
    {
        return $this->hasMany(EntranceExam::class);
    }
}
