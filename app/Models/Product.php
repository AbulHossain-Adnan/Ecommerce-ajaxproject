<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable =['product_name','product_code','product_quantity','product_details','product_color','product_size','selling_price','discount_price','video_link','main_slider','hot_deal','best_rated','mid_slider','hot_new','trend','image_one','iamge_two','iamge_two','status'];
}
