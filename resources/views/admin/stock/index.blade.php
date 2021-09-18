@extends('admin.admin_layout')
@section('adminMain')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Starlight</a>
      <a class="breadcrumb-item" href="index.html">Tables</a>
      <span class="breadcrumb-item active">Data Table</span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
      
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-15p">Product code</th>
                <th class="wd-15p">Product name</th>
                <th class="wd-20p">image</th>
                <th class="wd-15p">Category</th>
                <th class="wd-10p">Brand</th>
                <th class="wd-25p">Quantity</th>
                <th class="wd-25p">status</th>
               
              </tr>
            </thead>
            <tbody>
              
              @foreach ($products as $item)    
              
              <tr>
                <td>{{$item->product_code}}</td>
                <td>{{$item->product_name}}</td>
                <td>
                  <img src="{{asset('product_images/'.$item->image_one)}}" width="100">
                </td>
                <td>{{$item->category_name}}</td>
                <td>{{$item->brand_name}}</td>
                <td>{{$item->product_quantity}}</td>
                <td>
                  @if($item->status == 1)
                  <span class="badge badge-success">Active</span>
                  @else
                  <span class="badge badge-danger">Deactive</span>
                  @endif
                </td>
            
              </tr>
              @endforeach
             
            
            </tbody>
          </table>
        </div><!-- table-wrapper -->
      </div><!-- card -->
@endsection