@extends('layouts.frontend_layout')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/styles/blog_styles.css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/styles/blog_responsive.css">
@section('frontendContent')

<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('frontend') }}/images/shop_background.jpg"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title">{{__('msg.title')}}</h2>
		</div>
	</div>

	<!-- Blog -->

	<div class="blog">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="blog_posts d-flex flex-row align-items-start justify-content-between">
						@foreach($blog_posts as $item)
					
						<!-- Blog post -->
						<div class="blog_post">
							<div class="blog_image" style="background-image:url({{asset('post_images/')}}/{{$item->post_image}})"></div>
							<div class="blog_text">{{$item->post_details_eng}}</div>
							<div class="blog_button"><a href="blog_single.html">{{__('msg.continew')}}</a></div>
						</div>
						@endforeach
						
						
					</div>
				</div>
					
			</div>
		</div>
	</div>

	<!-- Newsletter -->

<script src="{{ asset('frontend') }}/js/blog_custom.js"></script>


@endsection