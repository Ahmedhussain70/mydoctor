<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaboratoryOrderData extends Model
{
    use HasFactory;
     protected $table = 'laboratory_orderdata';
     protected $primaryKey = 'id';
}
