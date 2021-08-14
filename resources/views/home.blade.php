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

      <td><a class="btn btn-info" href="{{url('/user/order/details/'.$item->id)}}">View</a></td>
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
      
        <a href="{{ route('change.password') }}">Edit Profile</a>
      </div>
    </div>
  </div>
</div>
</div>

@endsection