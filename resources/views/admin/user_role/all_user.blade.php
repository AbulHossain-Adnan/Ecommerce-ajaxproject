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
        <h5>Data Table</h5>
        <p>DataTables is a plug-in for the jQuery Javascript library.</p>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Basic Responsive DataTable</h6>
        <p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will be immediately added to the table, as shown in this example.</p>
        
        <div class="table-wrapper">
         
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
              
                <th class="wd-15p">Name</th>
                <th class="wd-10p">Email</th>
                <th class="wd-25p">Access</th>
                <th class="wd-25p">Action</th>
              </tr>
            </thead>
            <tbody>
              
              @foreach ($users as $item)    
              
              <tr>
               <td>{{$item->name}}</td>
               <td>{{$item->email}}</td>
               <td> 
               	@if($item->product == 1)
                 <span class="badge badge-danger">product</span>
                 @else
                 @endif
                 	@if($item->category == 1)
                 <span class="badge badge-success">Category</span>
                 @else
                 @endif	@if($item->coupon == 1)
                 <span class="badge badge-info">Coupon</span>
                 @else
                 @endif	@if($item->division == 1)
                 <span class="badge badge-danger">Division</span>
                 @else
                 @endif	@if($item->orders == 1)
                 <span class="badge badge-warning">Orders</span>
                 @else
                 @endif	@if($item->seo == 1)
                 <span class="badge badge-danger">Seo</span>
                 @else
                 @endif	@if($item->reports == 1)
                 <span class="badge badge-primary">Reports</span>
                 @else
                 @endif
                 	@if($item->site_setting == 1)
                 <span class="badge badge-danger">site_setting</span>
                 @else
                 @endif
                 @if($item->return_order == 1)
                 <span class="badge badge-success">return_order</span>
                 @else
                 @endif
                 @if($item->contact_message == 1)
                 <span class="badge badge-danger">cont_msg</span>
                 @else
                 @endif
                  @if($item->product_comment == 1)
                 <span class="badge badge-info">p_cmnt</span>
                 @else
                 @endif
               

               </td>
             
                <td>
                  <form method="post" action="{{url('/user/role/delete/'.$item->id)}}">
                    @csrf
                    @method("DELETE")
                  
                   
                
                  <a class="btn btn-primary btn-sm" href="{{url('user/role/edit',$item->id)}}"><i class="fa fa-edit"></i></a>
                
                 <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                 
                </form>
                </td>
             
                
              </tr>
              @endforeach
             
            
            </tbody>
          </table>
        </div><!-- table-wrapper -->
      </div><!-- card -->
@endsection