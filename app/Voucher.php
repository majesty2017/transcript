<?php

namespace App;

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
        return $this->belongsTo('\App\User', 'student_id');
    }
}
