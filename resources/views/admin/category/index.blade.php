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
            <h6 class="card-body-title">Category List
                <a href="#" class="btn btn-warning btn-sm " style="float: right" data-toggle="modal"
                    data-target="#modaldemo3">Add New</a>


                    
            </h6>
          
            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap text-center">
                    <thead>
                        <tr>
                            <th class="wd-15p">Serial</th>
                            <th class="wd-15p">Category Name</th>
                            <th class="wd-20p">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $key=>$category)


                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>
                                <form method="post" action="{{ route('admin.category.destroy',$category->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a src="" class="btn btn-warning btn-sm "  id="edit" data-id="{{ $category->id }}">edit</a>
                          
                           <button type="submit" class="btn btn-danger btn-sm ">delete</button>
                        
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
            <form method="post" action="{{ route('admin.category.store') }}">
                @csrf
                <div class="modal-body pd-20">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category Name</label>
                        <input name="category_name" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Category Name"
                            class="@error('category_name') is-invalid @enderror">
                        @error('category_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                </div><!-- modal-body -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info pd-x-20">Add Category</button>
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
            <form method="post" action="{{ url('/admin/category/updated') }}">
                @csrf
               
                <input type="hidden" id="dataid" name="id" value="">
                <div class="modal-body pd-20">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category Name</label>
                        <input name="category_name" type="text" class="form-control" id="category_name"
                            aria-describedby="emailHelp" placeholder="Enter Category Name"
                            class="@error('category_name') is-invalid @enderror">
                        @error('category_name')
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


@endsection
@section('script')

<script>
      $(document).ready(function(){

    $('body').on('click',"#edit",function(){
        let id = $(this).data('id');
        $.get(`/admin/category/${id}/edit`,function(data){
            $("#dataid").val(id)
            $("#category_name").val(data.category_name)
            $("#modaldemo4").modal('show')
        })
    })
   })
</script>

@endsection