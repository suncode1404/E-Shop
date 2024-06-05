<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSpecification extends Model
{
    use HasFactory;

    protected $table = 'product_specification';
    protected $fillable = [
        'product_id ', 'ram', 'cpu', 'dia_cung', 'mau_sac','can_nang'
    ];
}
