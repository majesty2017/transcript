<?php

namespace App;

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
        return $this->belongsTo('\App\User', 'student_id');
    }
}
