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
          <a class="btn btn-success" href="{{ route('site.create') }}" class="nav-link">Add Site Setting+</a>
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-15p">Phone</th>
                <th class="wd-15p">Email</th>
                <th class="wd-20p">Address</th>
                <th class="wd-15p">Company Name</th>
                <th class="wd-10p">Facebook</th>
                <th class="wd-25p">Google</th>
                <th class="wd-25p">tweeter</th>
                <th class="wd-25p">youtube</th>
                <th class="wd-25p">Action</th>

              </tr>
            </thead>
            <tbody>
              
              @foreach ($sites as $item)    
              
              <tr>
                <td>{{$item->phone}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->address}}</td>
                <td>{{$item->company_name}}</td>
                <td>{{$item->facebook}}</td>
                <td>{{$item->google}}</td>
                <td>{{$item->tweeter}}</td>
                <td>{{$item->youtube}}</td>
                <td>
                  <form method="post" action="{{ route('site.destroy',$item->id) }}">
                    @csrf
                    @method('DELETE')
                   
                  <a class="btn btn-success btn-sm" href="{{ route('site.edit',$item->id) }}"><i class="fa fa-edit"></i></a>
                  <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                </form>
                </td>
             
                
              </tr>
              @endforeach
             
            
            </tbody>
          </table>
        </div><!-- table-wrapper -->
      </div><!-- card -->
@endsection