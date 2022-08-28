<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Slider;
use App\Models\Tag;
use App\Models\Image;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Childcategory;
use App\Models\Brand;
use App\Models\Wishlist;
use DB;
use App\Models\OrderDetail;
use App\Models\ResentView;
use Carbon\Carbon;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tags(){
        return $this->morphedByMany(Tag::class,'productable');
    }

    public function sliders(){
        return $this->morphedByMany(Slider::class,'productable');
    }

    public function images(){
        return $this->belongsToMany(Image::class,'product_images');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }

    public function childcategory(){
        return $this->belongsTo(Childcategory::class);
    }

    public function brand(){
        return $this->belongsto(Brand::class);
    }

    public function wishlist(){
        return $this->hasOne(Wishlist::class);
    }

    public function getActiveStatusAttribute(){
        if($this->status == 1){
            return 'Active';
        }else{
            return 'Deactive';
        }
    }

    public function getImageAttribute() {
        $id = DB::table('product_images')->where('product_id', $this->id)->first();
        $image_id = $id->image_id;
        $image = DB::table('images')->where('id' ,$image_id)->first();
        return $image;
    }

    public function getDiscountStatusAttribute(){
        if($this->discount_price == null){
            return 'new';
        }else{
            $selling_price = $this->selling_price;
            $discount_price = $this->discount_price;

            $diff_price = $selling_price - $discount_price;
            return round($diff_price * 100 /$selling_price).' ' . '%';
        }
    }
    public function getProductStatusAttribute (){
        $top_rated = DB::table('products')->where('id',$this->id)
                        ->whereNotNull('top_rated')->whereBetween('updated_at',[
                            Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()
                    ])->get();
        if($this->upcomming == 1 && $this->product_quantity == null){
            return "upcomming";
        
        }elseif($this->free_shipping == 1 && $top_rated){
            return 'free shipping' ;  
        }elseif(($top_rated && $this->free_shipping == 1 && $this->upcomming == 1) || $top_rated){
            foreach($top_rated as $top){
                return "top sales";
            }   
        }  
    }

    public function getSizesAttribute (){
        $sizes = $this->size;
        return explode(',',$sizes);
    }

    public function getColorsAttribute(){
        $colors = $this->color;
        return explode(',',$colors);
    }

    public function order_detail(){
        return $this->hasOne(OrderDetail::class);
    }

    public function resentView(){
        return $this->hasOne(ResentView::class);
    }

}
