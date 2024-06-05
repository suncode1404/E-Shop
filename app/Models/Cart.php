<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart';
    protected $fillable = [
        'user_id', 'total_price'
    ];

    public function cartItem() {
        return $this->hasMany(CartItem::class);
    }
    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }
}
