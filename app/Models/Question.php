<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';
    protected $fillable = [
        'user_id',
        'doctor_id',
        'specialty_id',
        'title',
        'content',
        'gender',
        'age',
        'medical_history',
        'status'
    ];

    protected $appends = ['total_answers', 'has_answered'];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function specialty()
    {
        return $this->belongsTo(Services::class);
    }

    public function getTotalAnswersAttribute()
    {
        return $this->answers()->count();
    }

    public function getHasAnsweredAttribute()
    {
        return $this->answers()->exists();
    }
}

