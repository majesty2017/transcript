<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Result extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'student_id',
        'course_title',
        'course_code',
        'credit_hours',
        'grade',
        'year',
        'semester',
    ];

    public function student() {
        return $this->belongsTo(User::class, 'student_id');
    }
}
