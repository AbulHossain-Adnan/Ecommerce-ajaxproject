@extends('layouts.app')
@section('user_home')
<div class="row   m-auto">
  <div class="col-sm-10   m-auto">
    <div class="card">
      <div class="card-body">
      <div class="card   m-auto">
  <div class="card-header"><h2>your Product wishlist</h2></div>
  <div class="card-body">



   <table class="table">
  <thead>
    <tr>
     
      <th>image</th>
      <th scope="col">Product name</th>
      <th scope="col">product color</th>
      <th scope="col">product size</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
@foreach($wishlists as $item)
    <tr>
   
      <td><img src="{{ asset('product_images/'.$item->product->image_one) }}"width="100"></td>
      <td scope="col">{{ $item->product->product_name }}</td>
      <td scope="col">{{ $item->product->product_color }}</td>
      <td scope="col">{{ $item->product->product_size }}</td>
      <td scope="col">
      	<button class="btn btn-danger btn-sm" >Add to card</button>
      </td>
    </tr>
    @endforeach

  </tbody>
</table>
  </div>
</div>
      </div>
    </div>
  </div>
</div>



@endsection