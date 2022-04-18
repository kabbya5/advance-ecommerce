<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getActiveAttribute(){
        if($this->status == 1){
            return "Active";
        }else{
            return 'Deactive';
        }
    }
}
