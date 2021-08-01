@extends('layouts.frontend_layout')
@section('frontendContent')
  <div class="col-sm-10 m-auto " >
   <div class="row">
  <div class="col-sm-6" >
       <div><h3>Shipping Area</h3></div>

    <div class="card" style="border-radius: 25px;">
      <div class="card-body">
       
       <form method="post" action="{{route('final_step')}}">
        @csrf

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Full Name</label>
      <input type="text" class="form-control" name="name" id="inputEmail4" placeholder="name">
    </div>

    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4" name="password" placeholder="Password">
    </div>
  </div>

  <div class="form-group">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" name="address" id="inputAddress2" >
  </div>
  <div class="form-row">
    <div class="form-group col-md-">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" name="city" id="inputCity">
    </div>
   <!--  <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div> -->
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" name="zip" class="form-control" id="inputZip">
    </div>
  </div>
 

      </div>


    </div><br>
     <div><h3>Payment Process</h3></div><br>
   <div class="row">
            <div class="col-lg-4">
            <label class="ckbox">
              <input type="radio" name="payment" value="1" checked="">
             <img src="{{ asset('frontend') }}/payments/cashon1.jpg" width="100" 
                                            alt="">
            </label>
            </div><!-- col-4 -->

         

          <div class="col-lg-4">
            <label class="ckbox">
              <input type="radio" name="payment" value="2">
            <img src="{{ asset('frontend') }}/payments/bkash.jpg" width="100" 
                                            alt="">
            </label>
            </div>

              <div class="col-lg-4">
            <label class="ckbox">
              <input type="radio" name="payment" value="3">
            <img src="{{ asset('frontend') }}/payments/stripe.jpg" width="100" 
                                      alt="">
            </label>
            </div>
            <br><br>
            <!-- col-4 -->
            
  </div><br>

  </div>


  <div class="col-sm-6">
     <div><h3>Order Details</h3></div>
    <div class="card" style="border-radius: 25px;">
      <div class="card-body">


      	<table class="table">
  <thead>
    <tr>
     <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">price</th>
      <th scope="col">color</th>
      <th scope="col">size</th>
    </tr>
  </thead>
  <tbody>

  	@foreach($cart as $item)

    <tr>
      <td>{{$item->id}}</td>
      <td>{{$item->name}}</td>

      <td>{{$item->price*$item->qty}}</td>

      <td>{{$item->options->color}}</td>
      <td>{{$item->options->size}}</td>
    </tr>

    @endforeach
     </tbody>
</table>

       <ul class="list-group" style="border: 2px solid red;border-radius: 10px">
		  <li class="list-group-item"><h4>Subtotal:: {{$carts['subtotal']}}$</h4></li>
      <li class="list-group-item"><h4>Discount=>   {{$carts['discount']}}%({{$carts['discount_amount']}}$)</h4></li>

      <li class="list-group-item"><h4>Coupon Name: {{$carts['name']}}</h4></li>
      <li class="list-group-item"><h4>Grand Total:: {{$carts['grand_total']}}$</h4></li>


@if($carts['name'] == "NULL")

      <input type="hidden" value="{{Cart::subtotal()}}" name="subtotal">

      @else

      <input type="hidden" value="{{$carts['grand_total']}}" name="subtotal">


      @endif


     


		</ul>
      </div>

    </div><br><br><br><br>
   
  <button type="submit" style="border-radius: 25px;" class="btn btn-success">Place Order</button>

       
 </form>
</div>
  </div>
 


 

 

@endsection
