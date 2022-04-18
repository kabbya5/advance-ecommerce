<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subcategory;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function subcategories(){
        return $this->hasMany(Subcategory::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}

