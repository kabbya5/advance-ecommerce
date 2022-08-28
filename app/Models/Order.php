<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shiping;
use App\Models\User;

class Order extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function order_details(){
        return $this->hasMany(OrderDetail::class);
        
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function shipping(){
        return $this->hasOne(Shiping::class);
    }
}
