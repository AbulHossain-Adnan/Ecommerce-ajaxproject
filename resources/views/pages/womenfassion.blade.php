@extends('layouts.frontend_layout')
@section('frontendContent')

<div class="row m-auto">
  <div class="col-sm-2">
    <div class="card">
      <div class="card-body">
      	
      	<br>
      	<br>
      	<br>
      	<br>
      	<br>
      	<h3>Category</h3>
      	<br>
      	<br>
      	
      	
       <ul class="list-group">
@foreach($categories as $item)
  <li class="list-group-item">{{ $item->category_name }}</li>
 @endforeach

      	<br>
      	<br>
      	<br>
      	<br>
 <h3>Brand</h3>
 <br>
 <br>
</ul>
<ul class="list-group">
@foreach($brands as $item)
  <li class="list-group-item">{{ $item->brand_name }}</li>
 @endforeach
</ul>

      </div>
    </div>
  </div>
  <div class="col-sm-10">
    <div class="card">
      <div class="card-body">
       <div class="new_arrivals">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="tabbed_container">
                    <div class="tabs clearfix tabs-right">
                        <div class="new_arrivals_title mt-50px"><h2>Women Fassion</h2></div><br><br>
                        <ul class="clearfix">
                            <li class="active"></li>
                         
                        </ul>
                        <div class="tabs_line"><span></span></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-9" style="z-index:1;">

                            <!-- Product Panel -->
                            <div class="product_panel panel active">
                                <div class="arrivals_slider slider">


                        @php
                        $cat=DB::table('categories')->first();
                        // ->skip(1)->limit(12)->get()
                        $catid=$cat->id;
                        $women_products=\App\Models\Product::with('brand','category')->where('status',1)->where('category_id',$catid)->limit(10)->get();
                        @endphp

                            @foreach($women_products as $item)

                                    <!-- Slider Item -->
                                    <div class="arrivals_slider_item">
                                        <div class="border_active"></div>
                                        <div
                                            class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                            <div
                                                class="product_image d-flex flex-column align-items-center justify-content-center">
                                              <img src="{{ asset('product_images/'.$item->image_one) }}" width="125">
                                            </div>
                                            <div class="product_content">
                                                @if($item->discount_price == null)
                                              <div class="product_price discount">{{ $item->selling_price }}</div>
                                            @else
                                              <div class="product_price discount">${{ $item->discount_price }}<span>${{ $item->selling_price }}</span></div>
                                            @endif

                                                

                                                <div class="product_name">
                                                    <div><a href="{{ route('singleproduct.show',$item->id) }}">{{ $item->product_name }}</a></div>
                                                </div>
                                                <div class="product_extras">
                                                    <div class="product_color">
                                                        <input type="radio" checked name="product_color"
                                                            style="background:#b19c83">
                                                        <input type="radio" name="product_color"
                                                            style="background:#000000">
                                                        <input type="radio" name="product_color"
                                                            style="background:#999999">
                                                    </div>
                                                    <button class="product_cart_button">Add to Cart</button>
                                                </div>
                                            </div>
                                            
                                             <button  class="addwish" data-id={{ $item->id }}>
                                            <div class="product_fav"><i class="fas fa-heart"></i></div>

                                            <ul class="product_marks">

                                                @php
                                                $amount= $item->selling_price - $item->discount_price;
                                                @endphp

                                                @if($item->discount_price == null)
                                                  <li class="product_mark product_new" style="background:blue;">new</li>

                                                @else
                                                 <li class="product_mark product_new">{{ $amount/$item->selling_price*100 }}%</li>
                                                @endif
                                             
                                               
                                            </ul>
                                        </div>
                                    </div>
                                  
                                    @endforeach

                                    

                                  
                                    </div>
                                </div>
                                <div class="arrivals_slider_dots_cover"></div>
                            </div>

                        </div>

                  

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

      </div>
    </div>
  </div>
</div>


















@endsection