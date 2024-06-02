<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = [
        'user_id','status_id','payment_id','quantity','total_price','name','phone','email','address','customer_notes'
    ];

    public function payment() {
        return $this->belongsTo(OrderPayment::class,'payment_id');
    }
    public function status() {
        return $this->belongsTo(Status::class,'status_id');
    }
}
