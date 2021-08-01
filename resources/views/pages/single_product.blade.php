@extends('layouts.app')
@section('user_home')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/styles/product_responsive.css">

	<!-- Single Product -->

	<div class="single_product">
		<div class="container">
			<div class="row">

				<!-- Images -->
				<div class="col-lg-2 order-lg-1 order-2">
					<ul class="image_list">
						<li data-image="images/single_4.jpg"><img src="" alt=""></li>
						<li data-image="images/single_2.jpg"><img src="{{ asset('product_images/'.$single_products->image_one) }}" alt=""></li>
						<li data-image="product_images/{{$single_products->image_one}}"><img src="{{ asset('product_images/'.$single_products->image_one) }}" alt=""></li>
					</ul>
				</div>

				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected"><img src="{{ asset('product_images/'.$single_products->image_one) }}" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<div class="product_category">{{ $single_products->category->category_name }}</div>
						<div class="product_name">{{ $single_products->product_name }}</div>
						<div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
						<div class="product_text"><p>{{ $single_products->product_details }}</p></div>
						<div class="order_info d-flex flex-row">
							<form action="#">

								<div class="row">
									<div class="col-lg-4">
										<div class="form-group">
											<label for="exampleFormControlSelect1">Color </label>
											<select class="form-control input-lg" id="exampleFormControlSelect1" name="color">
												@foreach($product_color as $color)
												<option value="{{ $color }}">{{ $color }}</option>
											@endforeach
											</select>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label for="exampleFormControlSelect1">Size </label>
											<select class="form-control input-lg" id="exampleFormControlSelect1" name="color">
												@foreach($product_size as $size)
												<option value="{{ $size }}">{{ $size }}</option>
											@endforeach
											</select>
										</div>
									</div>


										<div class="col-lg-4">
										<div class="form-group">
											<label for="exampleFormControlSelect1">Quanti </label>
										<input class="form-control"  type="number" value="1" pattern="[0-9]" name="qnt">
										</div>
									</div>
									
								</div>

								  @if($single_products->discount_price == null)
                                              <div class="product_price discount">{{ $single_products->selling_price }}</div>
                                            @else
                                              <div class="product_price discount">${{ $single_products->discount_price }}<span>${{ $single_products->selling_price }}</span></div>
                                            @endif


								<div class="button_container">
									<button type="button" class="button cart_button">Add to Cart</button>
									<div class="product_fav"><i class="fas fa-heart"></i></div>
								</div>
								
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Recently Viewed -->



	<div class="viewed">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="viewed_title_container">
						<h3 class="viewed_title">Product details</h3>
						<div class="viewed_nav_container">
							<div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
							<div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
						</div>
					</div>

					<div class="viewed_slider_container">
						
							<ul class="nav nav-tabs" id="myTab" role="tablist">
					  <li class="nav-item">
					    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Product details</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">video link</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Review</a>
					  </li>
					</ul>
					<div class="tab-content" id="myTabContent">
					  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">	{{ $single_products->product_details }}</div>
					  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">	{{ $single_products->video_link }}</div>
					  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">	{{ $single_products->product_name }}</div>

					</div>


					
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Brands -->

	@endsection