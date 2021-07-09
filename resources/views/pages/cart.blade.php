@extends('layouts.frontend_layout')
@section('frontendContent')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/styles/cart_styles.css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/styles/cart_responsive.css">
 
	<!-- Cart -->

	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="cart_container">
						<div class="cart_title">Shopping Cart</div>
						<div class="cart_items">
							<ul class="cart_list">

								<table class="table">
							  <thead>
							    <tr>
							      <th scope="col">id</th>
							      <th scope="col">name</th>
							      <th scope="col">quantity</th>
							      <th scope="col">price</th>

							    </tr>
							  </thead>
							  <tbody>
							   
							  </tbody>
							</table>
						</div>
						
						<!-- Order Total -->
						<div class="order_total">
						
						</div><br><br>

						<div class="row">
						  <div class="col-sm-6"> 
						     	@if(session()->has('coupon'))

						     	@else
						     		 <form method="post" action="{{ route('coupon.apply')}}">
						      	@csrf
								  <div class="form-group">
								    <label for="exampleInputEmail1"><h2>Coupon</h2></label>
								    <input type="text" class="form-control" name="coupon_name" aria-describedby="emailHelp" placeholder="Enter Coupon">
								  
								  </div>
								
								  <button type="submit" class="btn btn-primary">Apply coupon</button>
								</form>
						     	@endif
						     
						     
						   
						  </div>
						  
						  <div class="col-sm-6">
						  	<form action="">
						    	<div class="order_total_content text-md-right">
								<div class="order_total_title">Order Total:</div>
						
								@if(session()->has('coupon'))

								<div class="order_total_amount">{{ session()->get('coupon')['balance'] }}$</div>
								<div>
								<div class="order_total_title">Applyed Coupon:</div>
								<div class="order_total_amount">{{ session()->get('coupon')['name'] }}</div>
							</div>
							<div>
								<div class="order_total_title">Discount Amount:</div>
								<div class="order_total_amount">{{ session()->get('coupon')['discount'] }}$</div>
							</div>
							<div>
								<div class="order_total_title">Shipping Charge:</div>
								<div class="order_total_amount"><span class="badge badge-success">Free</span></div>
							</div>
								{{ session()->forget('coupon') }}
								@else
								<div class="order_total_amount">{{ Cart::subtotal() }}</div>
								@endif

								
							</div>
						     
						      <div class="cart_buttons">
									<button type="button" class="button cart_button_clear">All Clear</button>
									<a class="btn btn-primary btn-lg" href="{{ route('checkout') }}">Checkout</a>
									
								</div>
						      </div>
						   
						 
						</div>
						</form>




						
					</div>
				</div>
			</div>
		</div>
	</div>






<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	


<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


// function alldataa(){
//   $.ajax({ 
//   type:"GET",
//   datatype:'json',
//  url: "/cartdata/", 
//   success:function(response){
//     let data = ""
//     $.each(response, function(key,value){
//       data = data + "<tr>"
//       data = data + "<td>"+value.id+"</td>"
//       data = data + "<td>"+value.name+"</td>"
//       data = data + "<td>"+value.qty +"</td>"
//       data = data + "<td>"+value.price +"</td>"
//       data = data + "<td>"
//       data= data +"<button class='btn btn-primary btn-sm' onclick='editData("+value.id+")'>edit</button>"
//       data= data +"<button class='btn btn-danger btn-sm' onclick='deletedata("+value.id+")'>delete</button>"
//       data = data + "</td>"
//       data = data + "</tr>"
//     })
//     $('tbody').html(data);
    
//     }
//    })
//   }
  
// alldataa();





 function alldata(){
	$.ajax({
		type:"GET",
		datatype:"json",
		url:"/cartdata/",
		success:function(response){

			let data=""

			$.each(response, function(key,value){

				data= data + "<tr>"
				data= data + "<td>"+value.id+"</td>"
				data= data + "<td>"+value.name+"</td>"
				data= data + "<td>"
				data= data + "<button class='btn btn-danger btn-sm'>-</button>"
				data= data + "<input type='text' value='1' style='width:25px;'>"

				data= data + "<button class='btn btn-success btn-sm'>-</button>"

				data= data + "</td>"






				data= data + "<td>"+value.price+"</td>"
				data= data + "</tr>"

			})
			$('tbody').html(data);

		}

	});
}
alldata();
		
	</script>



@endsection