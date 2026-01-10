<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Doctors;

class Banner extends Model
{
    use HasFactory;
    protected $table = "banner";

    public function doctor()
    {
        return $this->belongsTo(Doctors::class, 'doctor_id');
    }
}
