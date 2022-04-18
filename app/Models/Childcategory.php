<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subcategory;

class Childcategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }
}
