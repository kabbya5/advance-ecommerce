<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function products(){
        return $this->morphToMany(Product::class,'productable');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
