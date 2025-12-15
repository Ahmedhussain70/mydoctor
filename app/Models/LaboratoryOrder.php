<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaboratoryOrder extends Model
{
    use HasFactory;
    protected $table = 'laboratory_orders';
    protected $primaryKey = 'id';
}
