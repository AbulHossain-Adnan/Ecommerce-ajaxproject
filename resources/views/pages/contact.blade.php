@extends('layouts.frontend_layout')
@section('frontendContent')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/styles/contact_responsive.css">





<div class="contact_info">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="contact_info_container d-flex flex-lg-row flex-column justify-content-between align-items-between">

						<!-- Contact Item -->
						<div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
							<div class="contact_info_image"><img src="images/contact_1.png" alt=""></div>
							<div class="contact_info_content">
								<div class="contact_info_title">Phone</div>
								<div class="contact_info_text">+38 068 005 3570</div>
							</div>
						</div>

						<!-- Contact Item -->
						<div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
							<div class="contact_info_image"><img src="images/contact_2.png" alt=""></div>
							<div class="contact_info_content">
								<div class="contact_info_title">Email</div>
								<div class="contact_info_text">fastsales@gmail.com</div>
							</div>
						</div>

						<!-- Contact Item -->
						<div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
							<div class="contact_info_image"><img src="images/contact_3.png" alt=""></div>
							<div class="contact_info_content">
								<div class="contact_info_title">Address</div>
								<div class="contact_info_text">10 Suffolk at Soho, London, UK</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Contact Form -->

	<div class="contact_form">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="contact_form_container">
						<div class="contact_form_title">Get in Touch</div>

					
							<div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
								<input type="text" id="name" name="name" class="contact_form_name input_field" placeholder="Your name" required="required" data-error="Name is required.">
								<input type="text" id="email" name="email" class="contact_form_email input_field" placeholder="Your email" required="required" data-error="Email is required.">
								<input type="text" id="phone"  name="phone" class="contact_form_phone input_field" placeholder="Your phone number">
							</div>
							<div class="contact_form_text">
								<textarea id="message" name="message" class="text_field contact_form_message" name="message" rows="4" placeholder="Message" required="required" data-error="Please, write us a message."></textarea>
							</div> 
							<div class="contact_form_button">
								<button type="submit" class="button contact_submit_button" onclick="sendmessage()">Send Message</button>
							</div>
					

					</div>
				</div>
			</div>
		</div>
		<div class="panel"></div>
	</div>

	<div class="contact_map">
		<div id="google_map" class="google_map">
			<div class="map_container">
				<div id="map"></div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	

<script type="text/javascript">




function sendmessage(){

var name = $('#name').val();
var email = $('#email').val();
var phone = $('#phone').val();
var message = $('#message').val();

	$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

	$.ajax({
		type:"POST",
		datatype:"json",
		data:{name:name,email:email,phone:phone,message:message},
		url:"/send/message/",
		success:function(data){
			var name = $('#name').val("");
			var email = $('#email').val("");
			var phone = $('#phone').val("");
			var message = $('#message').val("");
				

			const Toast = Swal.mixin({
			  toast: true,
			  position: 'top-end',
			  showConfirmButton: false,
			  timer: 3000,
			  timerProgressBar: true,
			  didOpen: (toast) => {
			    toast.addEventListener('mouseenter', Swal.stopTimer)
			    toast.addEventListener('mouseleave', Swal.resumeTimer)
			  }
			})


			 if ($.isEmptyObject(data.error)){
                      Toast.fire({
                      icon: 'success',
                      title: data.success
                    })
                     

                    }
                    else{
                        Toast.fire({
                          icon: 'error',
                          title: data.error
                        })
                    }

               


		}
		
		
	});


}
 



function couponremove(){

	$.ajax({
		type:"GET",
		datatype:"json",
		url:"/couponremove/",
		success:function(data){
			location.reload();
			cartcalculation();
			minicart(); 
			$('#applycouponfield').show();
			
				const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: 'coupon remove succesfully'
})



		}
	})
}



		
	</script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="{{ asset('frontend') }}/js/contact_custom.js"></script>


@endsection