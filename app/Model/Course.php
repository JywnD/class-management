<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Course extends Model
{
    protected $fillable = [
        'name',
        'detail',
        'start_date',
        'end_date',
        'teacher_id'
    ];

    public function students()
    {
        return $this->belongsToMany(User::class, 'course_student', 'course_id', 'student_id')->withPivot('attendances', 'midterm_mark', 'final_mark');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
