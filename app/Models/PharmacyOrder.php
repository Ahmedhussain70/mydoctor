<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class PharmacyOrder extends Model
{
    use HasFactory;
    protected $table = 'pharmacy_order';
    protected $primaryKey = 'id';

     protected $casts = [
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];
protected function serializeDate(\DateTimeInterface $date)
    {
       return $date->setTimezone('Asia/Baku')->toIso8601String();

    }
}
