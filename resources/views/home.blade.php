@extends('layouts.frontend_layout')
@section('frontendContent')
<div class="container">
<div class="row">
  <div class="col-sm-9">
    <div class="card">
      <div class="card-body">
       <table class="table table-bordered">
  <thead>
    <tr>
    
      <th scope="col">user Id</th>
      <th scope="col">paytype</th>
      <th scope="col">blnc transection</th>
      <th scope="col">paying amount</th>
      <th scope="col">status code</th>
      <th scope="col">return</th>

      <th scope="col">status</th>


      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
   @foreach($orders as $item)


    <tr>
      <td>{{$item->user_id}}</td>
      <td>{{$item->payment_type}}</td>
      <td>
        @if($item->blnc_transection ==null)
        <span class="badge badge-danger">NO Transection</span>
        @else
          {{$item->blnc_transection}}
        @endif

    
      </td>
      <td>{{$item->paying_amount}}</td>
      <td>{{$item->status_code}}</td>
         <td>
        @if($item->return == 1)
          <span class="badge badge-primary">requested</span>
          @elseif($item->return == 2)
            <span class="badge badge-success">approved</span>
            @elseif($item->return == 3)
            <span class="badge badge-danger">canceled</span>

            @else
            <span class="badge badge-warning">no requested</span>
            @endif



      </td>
      <td>
            @if($item->status == 0)
                   <span class="badge badge-warning">Pending</span>
                
                  @elseif($item->status == 1)
                    <span class="badge badge-success">Payment accept</span>
                      @elseif($item->status == 2)
                    <span class="badge badge-info">Progress</span>
                      @elseif($item->status == 3)
                    <span class="badge badge-success">Delevared</span>
                      @else
                    <span class="badge badge-danger">Cancel</span>
                 
                  @endif
      </td>



      <td>

        
        @if($item->status == 3)
         <a class="btn btn-info btn-sm" href="{{url('/user/order/details/'.$item->id)}}">view</a>
          <a class="btn btn-danger btn-sm" href="{{url('/user/order/return/'.$item->id)}}">return</a>

                @else
                  <a class="btn btn-primary btn-sm" href="{{url('/user/order/details/'.$item->id)}}">view</a>
                @endif

  
      </td>

    </tr>
    @endforeach
  </tbody>
</table>
      </div>
    </div>
  </div>
  <div class="col-sm-3 m-auto">
    <div class="card">
      <div class="card-body m-auto">
       @if(Auth::user()->image)
          <img src="{{asset('user_images/'.Auth::user()->image)}}" style="width:100px;">
      @else
      @endif
     








<form method="post" action="{{url('/user/profile_image/update/'.Auth()->id())}}" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Profile Image</label>
    <input type="file" class="form-control" id="exampleInputEmail1" name="image" aria-describedby="emailHelp" placeholder="Enter email">
   
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>






      </div>
    </div>
  </div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>







    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">My Order Tracking</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                   <form method="post" action="{{url('/order/tracking/')}}">
                    @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">Status Code</label>
                <input type="Text" class="form-control" name="status_code" aria-describedby="emailHelp" placeholder="Enter Status Code">
               
              </div>
              <button type="submit" class="btn btn-danger">Tracking</button>
           </form>
      </div>
     
    </div>
  </div>
</div>




@endsection