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
                            <th class="wd-15p">Id</th>
                          
                            <th class="wd-15p">area</th>

                            <th class="wd-20p">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                       

                    	@foreach($areas as $item)
                        <tr>
                        	<td>{{$item->id}}</td>
                            <td>{{$item->area}}</td>
                            <td>
                                <form method="post" action="">
                                    @csrf
                                    @method('DELETE')
                                    <a src="" class="btn btn-warning btn-sm "  id="edit" data-id="{{$item->id}}">edit</a>
                          
                           <button type="button" value="{{$item->id}}" id="areadelete" class="btn btn-danger btn-sm ">delete</button>
                        
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
            <form method="post" action="{{ route('area.store') }}">
                @csrf
                <div class="modal-body pd-20">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Area Name</label>
                        <input name="area_name" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Area Name"
                            class="@error('area_name') is-invalid @enderror">
                        @error('area_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                      <div class="form-group">
                        <span class="text-danger" id="id_error"></span>
                        <select class="form-control select2" data-placeholder="Choose country" id="category_id" name="district_id">
                    <option label="Choose district"></option>

                        @foreach ($districts as $item)
                        
                    <option id="district_id" value="{{$item->id}}">{{$item->district}}</option>
  							@error('district_id')
                      <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    @endforeach
                  
                 
                  </select>
          </div>


                </div><!-- modal-body -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info pd-x-20">Add Area</button>
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
            <form method="post" action="{{ url('area/updated') }}">
                @csrf
               
                <input type="hidden" id="dataid" name="id" value="">
                <div class="modal-body pd-20">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Area Name</label>
                        <input name="area_name" type="text" class="form-control" id="area_name"
                            aria-describedby="emailHelp" placeholder="Enter area Name"
                            class="@error('area_name') is-invalid @enderror">
                        @error('area_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                     <div class="form-group">
                        <span class="text-danger" id="id_error"></span>
                        <select class="form-control select2" data-placeholder="Choose country" id="district" name="district_id">
                    <option label="Choose district"></option>

                        @foreach ($districts as $item)
                        
                    <option id="district_id" value="{{$item->id}}">{{$item->district}}</option>
                    @error('district_id')
                     <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    @endforeach
                 
                  </select>
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



<!-- modal for delete// -->

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
        <form method="post" action="{{url('/area/delete/')}}">
            @csrf
            @method('DELETE')
       <h5> Are You Sure You Want to Delete this ?</h5>
       <input type="hidden" name="area_id" id="area_id">
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
        $.get(`/area/${id}/edit`,function(data){
            $("#dataid").val(id)
            $("#area_name").val(data.area)
            $("#modaldemo4").modal('show')
        })
    })
   })
</script>
<script type="text/javascript">
    $('document').ready(function(){
        $('body').on('click','#areadelete',function(){
            let data_id=$(this).val();
            $('#deletemodal1').modal('show')
            $('#area_id').val(data_id)

        })
    })
</script>

@endsection