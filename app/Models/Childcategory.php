<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subcategory;
use App\Models\Product;

class Childcategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
