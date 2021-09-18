@extends('layouts.frontend_layout')
@section('frontendContent')
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
      	<button class="btn btn-danger btn-sm" onclick="addtocart()" >Add to card</button>
      </td>
      <input type="hidden" value="{{$item->id}}" id="product_id" name="product_id">
      <input type="hidden" value="{{ $item->product->product_color }}" id="color" name="color">
      <input type="hidden" value="{{ $item->product->product_size }}" id="size" name="size">
      <input type="hidden" value="1" id="quantity" name="quantity">

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

<script type="text/javascript">
    function addtocart(){
       $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

       var id=$('#product_id').val();
       var color=$('#color').val();
       var size=$('#size').val();
       var quantity=$('#quantity').val();


       $.ajax({
        type:"POST",
        datatype:'json',
        data:{product_id:id,color:color,size:size,quantity:quantity},
        url:"/addtocart/",
        success:function(data){
            minicart();
           
            $("#cartmodal").modal('hide')

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
  title: 'cart added successfully'
})

        }
       })
    }
  </script>

@endsection