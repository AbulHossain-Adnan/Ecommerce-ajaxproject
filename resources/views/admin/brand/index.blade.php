@extends('admin.admin_layout')
@section('adminMain')


<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Tables</a>
        <span class="breadcrumb-item active">Data Table</span>
        </nav>
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Brand List
                <a href="#" class="btn btn-success btn-sm " style="float: right" data-toggle="modal"
                    data-target="#modaldemo3">Add New+</a>
            </h6>
          
            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap text-center">
                    <thead>
                        <tr>
                            <th class="wd-15p">Serial</th>
                                     <th class="wd-15p">brand name</th>
                            <th class="wd-15p">brand image</th>
                            <th class="wd-20p">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $key=>$brand)


                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $brand->brand_name }}</td>
                            <td>
                            	
                            	 <img src="{{asset('images/'.$brand->brand_photo)}}" width="100">
                            </td>
                            
                            <td>
                                <form method="post" action="">
                                    @csrf
                                    @method('DELETE')
                                    <a src="" class="btn btn-warning btn-sm "  id="edit" data-id="{{ $brand->id }}"><i class="fa fa-edit"></i></a>
                          
                           <button type="button" value="{{$brand->id}}" id="branddelete" class="btn btn-danger btn-sm "><i class="fa fa-trash"></i></button>
                        
                             </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->







    </div><!-- sl-pagebody -->

</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->


{{-- start modal here  --}}

<!-- LARGE MODAL -->
<div id="modaldemo3" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Message Preview</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ route('brand.store') }}" enctype="multipart/form-data" id="modalvalidate">
                @csrf
                <div class="modal-body pd-20">
                    <div class="form-group">
                        <label for="exampleInputEmail1">brand Name</label>
                        <input name="brand_name" type="text" class="form-control" id="brand_name"
                            aria-describedby="emailHelp" placeholder="Enter brand Name"
                            class="@error('brand_name') is-invalid @enderror">
                        @error('category_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                     
                 
                    <div class="form-group">
                        <label for="exampleInputEmail1">brand photo</label>
                        <input name="brand_photo" type="file" class="form-control" id="brand_photo"
                            aria-describedby="emailHelp" placeholder="Enter brand Name"
                            class="@error('brand_photo') is-invalid @enderror">
                        @error('brand_photo')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div><!-- modal-body -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info pd-x-20">Add brand</button>
                    <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->
{{-- end modal here  --}}

<!-- LARGE MODAL for edit -->
<div id="modaldemo4" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Message Preview</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ url('/brand/updated') }}" enctype="multipart/form-data">
                @csrf
               
                <input type="hidden" id="dataid" name="id" value="">
                <div class="modal-body pd-20">
                    <div class="form-group">
                        <label for="exampleInputEmail1">brand Name</label>
                        <input name="brand_name" type="text" class="form-control" id="brand_name"
                            aria-describedby="emailHelp" placeholder="Enter brand Name"
                            class="@error('brand_name') is-invalid @enderror">
                        @error('brand_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                
                      <div class="form-group">
                        <label for="exampleInputEmail1">New brand photo</label>
                        <input name="brand_photo" type="file" class="form-control" id="brand_photo"
                            aria-describedby="emailHelp" placeholder="Enter brand photo"
                            class="@error('brand_photo') is-invalid @enderror">
                        @error('brand_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div><!-- modal-body -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info pd-x-20">Update</button>
                    <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->
{{-- end modal here  --}}

<!-- modal for delete -->
<div class="modal fade" id="deletemodal1" tabindex="1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">Confirm?</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{url('/brand/delete/')}}">
            @csrf
            @method('DELETE')
       <h5> Are You Sure You Want to Delete this ?</h5>
       <input type="hidden" name="brand_id" id="data_id">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Yes I want to delete</button>
        </form>
      </div>
    </div>
  </div>
</div>


@endsection
@section('script')

<script>
      $(document).ready(function(){

    $('body').on('click',"#edit",function(){
        let id = $(this).data('id')
        $.get(`/brand/${id}/edit`,function(data){
            $("#dataid").val(id)
            $("#brand_name").val(data.brand_name)
            $("#modaldemo4").modal('show')
        })
    })
   })
</script>
<script type="text/javascript">
    $('document').ready(function(){
        $('body').on('click','#branddelete', function(){
            let id = $(this).val();
           $('#deletemodal1').modal('show')
           $('#data_id').val(id)
        })
    })
</script>




<script>

  $('document').ready(function(){
     $("#modalvalidate").validate({
        rules: {
            brand_name: {
                required: true,
            },

            brand_photo: {
                required: true,
            },
          
             
             
        },
        messages: {
            brand_name:"brand name field is required",
             brand_photo:"brand photo field is required",
           
            
        }
    });
  })
</script>

@endsection