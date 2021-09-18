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
            <h6 class="card-body-title">Seo
                <a href="#" class="btn btn-warning btn-sm " style="float: right" data-toggle="modal"
                    data-target="#modaldemo3">Add New</a>


                    
            </h6>
          
            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap text-center">
                    <thead>
                        <tr>
                            <th class="wd-15p">Serial</th>
                            <th class="wd-15p">meta title</th>
                            <th class="wd-15p">meta author/th>
                            <th class="wd-15p">meta tag</th>
                            <th class="wd-15p">meta description</th>
                            <th class="wd-15p">google analytics</th>
                            <th class="wd-15p">bing analyticst</th>
                            <th class="wd-20p">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($seos as $key=>$item)


                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->meta_title }}</td>
                            <td>{{ $item->meta_author }}</td>
                            <td>{{ $item->meta_tag }}</td>
                            <td>{{ $item->meta_description }}</td>
                            <td>{{ $item->google_analytics }}</td>
                            <td>{{ $item->bing_analyticst }}</td>
                            <td>
                               
                    
                         <form method="post" action="{{url('/seo/delete/'.$item->id)}}">
                            @csrf
                            @method('DELETE')
                               <a src="" class="btn btn-warning btn-sm "  id="edit" data-id="{{ $item->id }}">edit</a>
                              <button type="button" value="{{$item->id}}" class="btn btn-danger btn-sm" id="deletemodal">
                              delete
                            </button>

                         </form>
                          
                          
                        
                            </td>

                        </tr>
                        @empty
                        <span>no data to show</span>
                        @endforelse
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
        <div class="modal-content tx-size-lg">
            <div class="modal-header pd-x-60">
                <h6 class="tx-34 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Seo</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ route('seo.store')}} " id="newModalForm">
                @csrf
                <div class="modal-body pd-10">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Meta Title</label>
                        <input name="meta_title" type="text" id="meta_title" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Meta Title Name"
                            class="@error('category_name_eng') is-invalid @enderror">


                        @error('meta_title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Meta Author</label>
                        <input name="meta_author" type="text" class="form-control" id="meta_author"
                            aria-describedby="emailHelp" placeholder="Enter Meta Author Name"
                            class="@error('category_name_eng') is-invalid @enderror">
                        @error('meta_author')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Meta tag</label>
                        <input name="meta_tag" id="meta_tag" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Meta Tag Name"
                            class="@error('category_name_eng') is-invalid @enderror">
                        @error('meta_tag')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Meta Description</label>
                        <input name="meta_description" type="text" class="form-control" id="meta_description"
                            aria-describedby="emailHelp" placeholder="Enter Meta Description Name"
                            class="@error('category_name_eng') is-invalid @enderror">
                        @error('meta_description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Google Analytics</label>
                        <input name="google_analytics" type="text" class="form-control" id="google_analytics"
                            aria-describedby="emailHelp" placeholder="Enter Google Analytics Name"
                            class="@error('category_name_eng') is-invalid @enderror">
                        @error('google_analytics')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                     <div class="form-group">
                        <label for="exampleInputEmail1">bing analyticst</label>
                        <input name="bing_analyticst" type="text" class="form-control" id="bing_analyticst"
                            aria-describedby="emailHelp" placeholder="Enter bing analyticst Name"
                            class="@error('category_name_eng') is-invalid @enderror">
                        @error('bing_analyticst')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                
              
                </div><!-- modal-body -->
                <div class="modal-footer">
                    <button type="submit" id="seo" class="btn btn-info pd-x-20">Add Seo</button>
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
          <form method="post" action="{{ url('/seo/updated/') }} ">
                @csrf
                <div class="modal-body pd-20">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Meta Title</label>
                        <input name="meta_title" type="text" class="form-control" id="meta_title1" value="" 
                            aria-describedby="emailHelp" placeholder="Enter Category Name"
                            class="@error('category_name_eng') is-invalid @enderror">
                        @error('meta_title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="hidden" name="id" id="id">
                    </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Meta Author</label>
                        <input name="meta_author" type="text" class="form-control" id="meta_author1"
                            aria-describedby="emailHelp" placeholder="Enter Category Name"
                            class="@error('category_name_eng') is-invalid @enderror">
                        @error('post_title_eng')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Meta tag</label>
                        <input name="meta_tag" type="text" class="form-control" id="meta_tag1"
                            aria-describedby="emailHelp" placeholder="Enter Category Name"
                            class="@error('category_name_eng') is-invalid @enderror">
                        @error('post_title_eng')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Meta Description</label>
                        <input name="meta_description" type="text" class="form-control" id="meta_description1"
                            aria-describedby="emailHelp" placeholder="Enter Category Name"
                            class="@error('category_name_eng') is-invalid @enderror">
                        @error('post_title_eng')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Google Analytics</label>
                        <input name="google_analytics" type="text" class="form-control" id="google_analytics1"
                            aria-describedby="emailHelp" placeholder="Enter Category Name"
                            class="@error('category_name_eng') is-invalid @enderror">
                        @error('post_title_eng')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                     <div class="form-group">
                        <label for="exampleInputEmail1">bing analyticst</label>
                        <input name="bing_analyticst" type="text" class="form-control" id="bing_analyticst1"
                            aria-describedby="emailHelp" placeholder="Enter Category Name"
                            class="@error('category_name_eng') is-invalid @enderror">
                        @error('post_title_eng')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
              
                </div><!-- modal-body -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info pd-x-20">Update Seo</button>
                    <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->
{{-- end modal here  --}}





<!-- Button trigger modal -->


<!-- Modal -->
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
        <form method="post" action="{{url('/seo/delete/')}}">
            @csrf
            @method('DELETE')
       <h5> Are You Sure You Want to Delete this ?</h5>
       <input type="hidden" name="seo_id" id="data_id">
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
   $('document').ready(function(){
    $('body').on('click','#edit',function(){
      let id = $(this).data('id');
      $.ajax({
        type:"GET",
        datatype:'json',
        url:"/seo/edit/"+id,
        success:function(data){
        
        $('#meta_title1').val(data.meta_title)
          $('#meta_author1').val(data.meta_author)
          $('#meta_description1').val(data.meta_description)
          $('#meta_tag1').val(data.meta_tag)
          $('#google_analytics1').val(data.google_analytics)
          $('#bing_analyticst1').val(data.bing_analyticst)
          $('#id').val(data.id)
            $('#modaldemo4').modal('show')

        }


      })
    })
   })


</script>

<script type="text/javascript">

  $('document').ready(function(){
     $("#newModalForm").validate({
        rules: {
            meta_title: {
                required: true,
            },

            meta_author: {
                required: true,
            },
          
              meta_tag: {
                required: true,
            },
          
              meta_description: {
                required: true,
            },
          
              google_analytics: {
                required: true,
            },
           
              bing_analyticst: {
                required: true,
            },
             
        },
        messages: {
            meta_title:"meta title field is required",
             meta_author:"meta author field is required",
             meta_tag:"meta tag field is required",
             meta_description:"meta description field is required",
             google_analytics:"google_analytics field is required",
             bing_analyticst:"bing_analyticst field is required",
            
        }
    });
  })
</script>

<script type="text/javascript">
    
    $('document').ready(function(){
        $('body').on('click','#deletemodal', function(){
            let delete_id=$(this).val();
            
            $('#deletemodal1').modal('show')
            $('#data_id').val(delete_id)
        })
        
    })
</script>



@endsection