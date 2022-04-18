<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Slider extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function products (){
        return $this->morphToMany(Product::class,'productable');
    }
    public function getActiveStatusAttribute(){
        if($this->status == 1){
            return 'Active';
        }else{
            return "Deactive";
        }
    }
}
