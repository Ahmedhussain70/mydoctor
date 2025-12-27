<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'question_id',
        'doctor_id',
        'answer'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctors::class);
    }
}

