<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerReview extends Model
{
    use HasFactory;
    protected $table = 'customer_review';
    protected $fillable = [
        'user_id','product_id','content'
    ];

    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }
}
