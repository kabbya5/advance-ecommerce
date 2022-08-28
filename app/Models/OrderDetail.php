<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class OrderDetail extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
