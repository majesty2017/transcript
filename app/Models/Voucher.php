<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voucher extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'student_id',
        'voucher_code',
        'status'
    ];

    public function student() {
        return $this->belongsTo(User::class, 'student_id');
    }
}
