<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'name', 'description', 'price', 'image', 'heart','view','hidden','hot'
    ];
    //localscopes
    public function scopeSearch($query)
    {
        if ($key = request()->search) {
            $query = $query->where('name', 'like', '%' . $key . '%');
        }
        return $query;
    }

    public function scopeActive($query,$slot=8) {
        return $query->where('hidden',1)->orderBy('created_at','desc')->take($slot);
    }
    public function scopeHot($query,$slot=8) {
        return $query->where('hot',1)->orderBy('created_at','desc')->take($slot);
    }
}
