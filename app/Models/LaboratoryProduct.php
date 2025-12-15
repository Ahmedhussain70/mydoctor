<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaboratoryProduct extends Model
{
    use HasFactory;
    protected $table = 'laboratory_products';
      protected $primaryKey = 'id';
}
