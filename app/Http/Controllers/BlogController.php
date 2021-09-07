<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Seo;
use App\Models\Admin\Site;
use App\Models\Admin\Category;
use App\Models\Admin\Post;




class BlogController extends Controller
{
   public function blogpost(){
   	return view('pages/blog',['seos'=>Seo::first(),'site_setting'=>Site::first(),'categories'=>category::all(),'blog_posts'=>Post::all()]);
   }
   public function switch(Request $Request, $local){
   	session(['APP_LOCALE'=>$local]);
   	return redirect()->back();
   }
}
