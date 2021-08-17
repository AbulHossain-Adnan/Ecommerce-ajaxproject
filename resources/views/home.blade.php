@extends('layouts.app')

@section('user_home')
<div class="container">
<div class="row">
  <div class="col-sm-8">
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
      <th scope="col">status</th>


      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
   @foreach($orders as $item)
    <tr>
      <td>{{$item->user_id}}</td>
      <td>{{$item->payment_type}}</td>
      <td>{{$item->blnc_transection}}</td>
      <td>{{$item->paying_amount}}</td>
      <td>{{$item->status_code}}</td>
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
         <a class="btn btn-info" href="{{url('/user/order/details/'.$item->id)}}">View</a>
          <a class="btn btn-danger" href="{{url('/user/order/details/'.$item->id)}}">Return</a>

                @else
                  <a class="btn btn-info" href="{{url('/user/order/details/'.$item->id)}}">View</a>
                @endif

        <a class="btn btn-info" href="{{url('/user/order/details/'.$item->id)}}">View</a>
      </td>

    </tr>
    @endforeach
  </tbody>
</table>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
      
        <a class="btn btn-info" href="{{ route('change.password') }}">Edit Profile</a><br><br>
        <a class="btn btn-warning" href="{{ route('change.password') }}">Return Order</a>

      </div>
    </div>
  </div>
</div>
</div>

@endsection