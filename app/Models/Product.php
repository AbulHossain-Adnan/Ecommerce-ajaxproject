<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Product;


class Product extends Model
{
    use HasFactory;
    protected $fillable =['product_name','category_id','brand_id','product_code','product_quantity','product_details','product_color','product_size','selling_price','discount_price','video_link','main_slider','hot_deal','best_rated','mid_slider','hot_new','trend','byeonegetone','image_one','image_two','image_three','status'];
       public function brand()
    {
        return $this->belongsTo(brand::class);
    }
       public function category()
    {
        return $this->belongsTo(category::class);
    }
    
     

}
