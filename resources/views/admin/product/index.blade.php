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
          <a class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg" href="" class="nav-link">Add product+</a>
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
                <th class="wd-25p">Action</th>
              </tr>
            </thead>
            <tbody>
              
            
             
            
            </tbody>
          </table>
        </div><!-- table-wrapper -->
      </div><!-- card -->










<!-- modal for update -->

<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <div class="modal" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
     <div class="card-header text-white bg-primary text-center">Product View</div>
    <div class="modal-content">
     
   
  <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">New product Add</h6>
          <p class="mg-b-20 mg-sm-b-30">New Product Add Form</p>
        <form id="updateform" action="" method="post" enctype="multipart/form-data">
        @csrf
        
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                  @error('Product_name')
                  <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input  class="form-control" id="product_idd1" type="hidden" name="id" value="">
                  <input id="product_name1" class="form-control" type="text" name="Product_name"  value="">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                  @error('Product_code')
                  <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  <input id="product_code1" class="form-control" type="text" name="Product_code"  value="">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Quantity<span class="tx-danger">*</span></label>
                  @error('Product_quantity')
                  <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  <input id="Product_quantity1" class="form-control" type="text" name="Product_quantity" value="">
                </div>
              </div><!-- col-4 -->
             
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                  @error('category_id')
                  <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  <select class="form-control select2" data-placeholder="Choose country" id="category_id1" name="category_id" value="category_id">
                    <option label="Choose category"></option>

                   
                        @foreach ($categories as $item)
                            
                      
                    
                    <option value="{{$item->id}}" <?php 

                    if($item->id == 'sdfs'){
                      echo "selected";
                    }


                  ?>>{{$item->category_name}}</option>

                    @endforeach
                 
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Subcategory: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose country" id="subcategory_id1" name="subcategory_id">
                   
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                  @error('brand_id')
                  <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  <select class="form-control select2" data-placeholder="Choose country" id="brand_id1" name="brand_id" value="">

                    <option label="Choose brand"></option>
                    @foreach ($brands as $item)  
                    <option value="{{$item->id}}" <?php 

                    if($item->id == "sds"){
                      echo "selected";
                    }


                  ?>>{{$item->brand_name}}</option>
                    @endforeach
                   
                  </select>

                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product size<span class="tx-danger">*</span></label>
                  <input data-role="tagsinput" id="product_size1" class="form-control" type="text" name="product_size" placeholder="Enter Product Size">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product color<span class="tx-danger">*</span></label>
                  @error('Product_color')
                  <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  <input data-role="tagsinput" class="form-control" type="text" name="Product_color" placeholder="Ennter Product Color" id="Product_color1" >
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Selling price<span class="tx-danger">*</span></label>
                  @error('selling_price')
                  <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  <input id="selling_price1" class="form-control" type="text" name="selling_price" value="$product->selling_price">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Video link<span class="tx-danger">*</span></label>
                  @error('video_link')
                  <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  <input class="form-control" id="video_link1" name="video_link" value="$product->video_link">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">discount price<span class="tx-danger">*</span></label>
                  @error('discount_price')
                  <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  <input id="discount_price1" class="form-control" type="text" name="discount_price" value="$product->discount_price">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">status<span class="tx-danger">*</span></label>
                  @error('status')
                  <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  <input id="status" class="form-control" type="text" name="status" value="1">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
                                    <div class="form-group">
                  <label class="form-control-label">Product details<span class="tx-danger">*</span></label>
                  @error('product_details')
                  <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  <textarea class="form-control product_detail" type="text" name="product_details" id="summernote2"></textarea>
                </div> 
                
              </div><!-- col-4 -->
           
             
           
            
      
            
              <div id="image_one1" class="col-lg-4">
               
              </div><!-- col-4 -->
              <div id="image_two2" class="col-lg-4">
               
              </div><!-- col-4 -->
              <div id="image_three3" class="col-lg-4">
               
                      
                 
                </div>
              </div><!-- col-4 -->
              <br> <br>
           

             
              
            </div><!-- row -->
            <br> <br> <br>
            <hr>
            <br>
                   <br>
                  
                
              
            <div class="row">
            <div id="main_slider1" class="col-lg-4">
           
            </div><!-- col-4 -->



               <div id="mid_slider1" class="col-lg-4">
         
            </div><!-- col-4 -->






            <div id="hot_deal1" class="col-lg-4">
           
            </div><!-- col-4 -->




            <div id="hot_new1" class="col-lg-4">
           
            </div><!-- col-4 -->



          



            <div id="trend1" class="col-lg-4">
          
            </div><!-- col-4 -->




             <div id="byeonegetone1" class="col-lg-4">
            
            </div><!-- col-4 -->



            <div id="best_rated1" class="col-lg-4">
            
            </div><!-- col-4 -->
            </div><!-- row -->
            <br>
            <br>

            <div class="form-layout-footer">
              <button type="submit" class="btn btn-info mg-r-5">Submit Form</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </div><!-- card -->
        </form>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
        






        <script type="text/javascript">
        function readURL(input){
          if(input.files && input.files[0]){
            let reader = new FileReader();
               reader.onload = function(e){
              $('#one')
              .attr('src', e.target.result)
              .width(100)
              .height(100);

            };
            reader.readAsDataURL(input.files[0]);
          }
        }
        
        </script>


        <script type="text/javascript">
        function readURL2(input){
          if(input.files && input.files[0]){
            let reader = new FileReader();
               reader.onload = function(e){
              $('#two')
              .attr('src', e.target.result)
              .width(100)
              .height(100);

            };
            reader.readAsDataURL(input.files[0]);
          }
        }
        
        </script>


        <script type="text/javascript">
        function readURL3(input){
          if(input.files && input.files[0]){
            let reader = new FileReader();
               reader.onload = function(e){
              $('#three')
              .attr('src', e.target.result)
              .width(100)
              .height(100);

            };
            reader.readAsDataURL(input.files[0]);
          }
        }
        
    </script>

     <script type="text/javascript">
      
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


      $(document).ready(function(){
        $('select[name="category_id"]').on('change',function(){
          var category_id = $(this).val();
          if(category_id){
            $.ajax({
              type:"GET",
              dataType:"json",
              url:"/get_subcategory/"+category_id,
              success:function(data){
                $('select[name="subcategory_id"]').empty();
                $.each(data, function(key, value){
                  $('select[name="subcategory_id"]').append('<option value ="'+ value.id + '">' + value.sub_category_name + '</option>');
                });
              },
            });
          }else{
            alert('danger');
          }

        });
      });
    </script>

  </div>
</div>
      </div>
    </div>
  </div>
</div>






<!-- modal for add-->
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
       <div class="modal fade bd-example-modal-lg" id="largemodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
       <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">New product Add</h6>
          <p class="mg-b-20 mg-sm-b-30"><a class="btn btn-warning" href="">All product</a>
<a class="btn btn-primary" href="" class="nav-link">Home</a></p>
        <form id="formdata" action="" method="post" enctype="multipart/form-data">
        @csrf
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                  @error('Product_name')
                  <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    
                  <input id="product_name" class="form-control" type="text" name="Product_name"  placeholder="Enter Product name" value="{{old('Product_name')}}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                  @error('Product_code')
                  <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  <input id="product_code" class="form-control" type="text" name="Product_code"  placeholder="Enter product code" value="{{old('Product_code')}}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Quantity<span class="tx-danger">*</span></label>
                  @error('Product_quantity')
                  <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  <input id="product_quantity" class="form-control" type="text" name="Product_quantity" placeholder="Enter product quantity" value="{{old('Product_quantity')}}">
                </div>
              </div><!-- col-4 -->
             
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                  @error('category_id')
                  <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  <select class="form-control select2" data-placeholder="Choose country" id="category_id" name="category_id">
                    <option label="Choose category"></option>
                        @foreach ($categories as $item)
                    <option value="{{$item->id}}">{{$item->category_name}}</option>
                    @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Subcategory: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose country" id="subcategory_id" name="subcategory_id">
                  
                  
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                  @error('brand_id')
                  <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  <select class="form-control select2" data-placeholder="Choose country" id="brand_id" name="brand_id">
                    <option label="Choose brand"></option>
                    @foreach ($brands as $item)
                        
                    
                    <option value="{{$item->id}}">{{$item->brand_name}}</option>

                    @endforeach
                   
                  </select>
                </div>
              </div><!-- col-4 -->
            
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product color<span class="tx-danger">*</span></label>
                  @error('Product_color')
                  <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  <input class="form-control" type="text" name="Product_color" id="product_colorr" data-role="tagsinput" placeholder="Enter product color" value="{{old('Product_color')}}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product size<span class="tx-danger">*</span></label>
                  @error('Product_color')
                  <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  <input class="form-control" type="text" name="product_size" id="product_sizee" data-role="tagsinput" placeholder="Enter product color" value="{{old('Product_size')}}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Selling price<span class="tx-danger">*</span></label>
                  @error('selling_price')
                  <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  <input class="form-control" type="text" name="selling_price" id="selling_price" placeholder="Enter product selling price" value="{{old('selling_price')}}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Video link<span class="tx-danger">*</span></label>
                  @error('video_link')
                  <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  <input class="form-control" id="video_link" name="video_link" placeholder="video link" value="{{old('video_link')}}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">discount price<span class="tx-danger">*</span></label>
                  @error('discount_price')
                  <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  <input class="form-control" id="discount_price" type="text" name="discount_price" placeholder="Enter product discount price" value="{{old('discount_price')}}">
                </div>
              </div><!-- col-4 -->
            

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Product details<span class="tx-danger">*</span></label>
                  @error('product_details')
                  <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  <textarea class="form-control" required="product_details" type="text" name="product_details" id="summernote"></textarea>
                 
                </div>
              </div><!-- col-4 -->
           
             
           
            
      
            
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label"> image one (main slider)<span class="tx-danger">*</span></label>
                  @error('image_one')
                  <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  <input class="form-control fileone" type="file" id="image_one" name="image_one" onchange="readURL(this)" >
                  <img src="#" alt="" id="file1">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label"> image two (main slider)<span class="tx-danger">*</span></label>
                  @error('image_two')
                  <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  <input id="image_two" class="form-control filetwo" type="file" onchange="readURL2(this)" name="image_two" >
                  <img src="#" alt="" id="file2">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label"> image three (main slider)<span class="tx-danger">*</span></label>
                  @error('image_three')
                  <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  <input class="form-control filethree" type="file" name="image_three" onchange="readURL3(this)" >
                  <img src="#" alt="" id="file3">
                </div>
              </div><!-- col-4 -->
              <br> <br>
           
          
            </div><!-- row -->
            <br> <br> <br>
            <hr>
            <br>
                   <br>
                  
              
            <div class="row">
            <div class="col-lg-4">
            <label class="ckbox">
              <input type="checkbox" id="main_slider" name="main_slider" value="1">
              <span>Main slider</span>
            </label>
            </div><!-- col-4 -->



            <div class="col-lg-4">
            <label class="ckbox">
              <input type="checkbox" id="mid_slider11" name="mid_slider" value="1">
              <span>Mid slider</span>
            </label>
            </div><!-- col-4 -->



            <div class="col-lg-4">
            <label class="ckbox">
              <input type="checkbox" id="hot_deal" name="hot_deal" value="1">
              <span>hot deal</span>
            </label>
            </div><!-- col-4 -->



            <div class="col-lg-4">
            <label class="ckbox">
              <input type="checkbox" id="hot_new" name="hot_new" value="1">
              <span>hot new</span>
            </label>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <label class="ckbox">
              <input type="checkbox" id="trend" name="trend" value="1">
              <span>trend product</span>
            </label>
            </div><!-- col-4 -->


             <div class="col-lg-4">
            <label class="ckbox">
              <input type="checkbox" id="byeonegetone" name="byeonegetone" value="1">
              <span>byeonegetone</span>
            </label>
            </div><!-- col-4 -->



            <div class="col-lg-4">
            <label class="ckbox">
              <input type="checkbox" id="best_rated" name="best_rated" value="1">
              <span>best rated</span>
            </label>
            </div><!-- col-4 -->
            </div><!-- row -->
            <br>
            <br>

            <div class="form-layout-footer">
              <button type="submit" class="btn btn-primary mg-r-5">Submit Form</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </div><!-- card -->
        </form>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
        


        <script type="text/javascript">
        function readURL(input){
          if(input.files && input.files[0]){
            let reader = new FileReader();
               reader.onload = function(e){
              $('#file1')
              .attr('src', e.target.result)
              .width(100)
              .height(100);

            };
            reader.readAsDataURL(input.files[0]);
          }
        }
        
        </script>


        <script type="text/javascript">
        function readURL2(input){
          if(input.files && input.files[0]){
            let reader = new FileReader();
               reader.onload = function(e){
              $('#file2')
              .attr('src', e.target.result)
              .width(100)
              .height(100);

            };
            reader.readAsDataURL(input.files[0]);
          }
        }
        
        </script>
        <script type="text/javascript">
        function readURL3(input){
          if(input.files && input.files[0]){
            let reader = new FileReader();
               reader.onload = function(e){
              $('#file3')
              .attr('src', e.target.result)
              .width(100)
              .height(100);

            };
            reader.readAsDataURL(input.files[0]);
          }
        }
    </script>



    <script type="text/javascript">
      $(document).ready(function(){
        $('select[name="category_id"]').on('change',function(){
          var category_id = $(this).val();
          if(category_id){
            $.ajax({
              type:"GET",
              dataType:"json",
              url:"/get_subcategory/"+category_id,
              success:function(data){
                $('select[name="subcategory_id"]').empty();
                $.each(data, function(key, value){
                  $('select[name="subcategory_id"]').append('<option value ="'+ value.id + '">' + value.sub_category_name + '</option>');
                });
              },
            });
          }else{
            alert('danger');
          }

        });
      });
    </script>








  <!-- script for form validation -->
  <script>
    $(document).ready(function(){
      $('#formdata').validate({
        rules:{
           Product_name: {
                  required: true,
                   minlength: 2      
                  },
             Product_code:{
                    required: true,
                    minlength: 2

                  },
             Product_quantity:{
                    required: true,
                    minlength: 2,
                    digits: true,
                  },

                  category_id:"required",
                  subcategory_id:"required",
                  brand_id:"required",
                  Product_color:"required",
                  product_size:"required",
                  video_link:"required",
                  product_details:"required",
                  image_one:{
                    required: true,
                    extension:"jpg|jpeg|png|gif",

                  },
                  image_two:{
                    required: true,
                    extension:"jpg|jpeg|png|gif",

                  },
                  image_three:{
                    required: true,
                    extension:"jpg|jpeg|png|gif",

                  },
                  selling_price:{
                    required: true,
                    minlength:2,
                    digits:true

                  },
                  discount_price:{
                    required: true,
                    minlength:2,
                    digits:true

                  },
                   product_details:{
                    required: true,
                    minlength:2,
                   

                  }
                           
        },
        messages:{
           Product_name:{
                    required:"product name field is not valid",
                    minlength:"please enter Atlast two charecter"
                },
                Product_code:{
                    required:"product code name field is required",
                    minlength:"please enter Atlast two charecter"
                },
                 Product_quantity:{
                    required:" quantity name field is not valid",
                    minlength:"please enter Atlast two charecter",
                    digits:"digits allow only"
                },
                 image_one:{
                    required:" image one field is required",
                    extension:"only support jpeg,jpg,gif,png format"
                },
                 image_two:{
                    required:" image one field is required",
                    extension:"only support jpeg,jpg,gif,png format"
                },
                 image_three:{
                    required:" image one field is required",
                    extension:"only support jpeg,jpg,gif,png format"
                },
                selling_price:{
                    required:" selling  field is not valid",
                    minlength:"please enter Atlast 2 digit",
                    digits:"digits allow only"
                },
                discount_price:{
                    required:" discount name field is not valid",
                    minlength:"please enter Atlast 2 digit",
                    digits:"digits allow only"
                },
                 product_details:{
                    required:" product details name field is not valid",
                    minlength:"please enter Atlast 2 digit"
                    
                }
                
        },
      })
    })
  </script>







  <!-- script for update validate -->

    <!-- script for form validation -->
  <script>
    $(document).ready(function(){
      $('#updateform').validate({
        rules:{
           Product_name: {
                  required: true,
                   minlength: 2      
                  },
             Product_code:{
                    required: true,
                    minlength: 2

                  },
             Product_quantity:{
                    required: true,
                    minlength: 2,
                    digits: true,
                  },

                  category_id:"required",
                  subcategory_id:"required",
                  brand_id:"required",
                  Product_color:"required",
                  product_size:"required",
                  video_link:"required",
                  product_details:"required",
                  image_one:{
                    required: true,
                    extension:"jpg|jpeg|png|gif",

                  },
                  image_two:{
                    required: true,
                    extension:"jpg|jpeg|png|gif",

                  },
                  image_three:{
                    required: true,
                    extension:"jpg|jpeg|png|gif",

                  },
                  selling_price:{
                    required: true,
                    minlength:2,
                    digits:true

                  },
                  discount_price:{
                    required: true,
                    minlength:2,
                    digits:true

                  },
                   product_details:{
                    required: true,
                    minlength:2,
                   

                  }
                           
        },
        messages:{
           Product_name:{
                    required:"product name field is not valid",
                    minlength:"please enter Atlast two charecter"
                },
                Product_code:{
                    required:"product code name field is required",
                    minlength:"please enter Atlast two charecter"
                },
                 Product_quantity:{
                    required:" quantity name field is not valid",
                    minlength:"please enter Atlast two charecter",
                    digits:"digits allow only"
                },
                 image_one:{
                    required:" image one field is required",
                    extension:"only support jpeg,jpg,gif,png format"
                },
                 image_two:{
                    required:" image one field is required",
                    extension:"only support jpeg,jpg,gif,png format"
                },
                 image_three:{
                    required:" image one field is required",
                    extension:"only support jpeg,jpg,gif,png format"
                },
                selling_price:{
                    required:" selling  field is not valid",
                    minlength:"please enter Atlast 2 digit",
                    digits:"digits allow only"
                },
                discount_price:{
                    required:" discount name field is not valid",
                    minlength:"please enter Atlast 2 digit",
                    digits:"digits allow only"
                },
                 product_details:{
                    required:" product details name field is not valid",
                    minlength:"please enter Atlast 2 digit"
                    
                }
                
        },
      })
    })
  </script>


<!-- script for fetch data -->
<script>
  function productalldata(){
    $.ajax({
      type:"GET",
      datatype:'json',
      url:"/product/create",
      success:function(response){
        rows=""
        $.each(response ,function(key,value){
          console.log(value)
          rows+=` 
           <tr>
                <td>${value.product_code}</td>
                <td>${value.product_name}</td>
                <td>
            <img src="{{asset('product_images/${value.image_one}')}}" width="100">
                </td>
                <td>${value.category_name}</td>
                <td>${value.brand_name}</td>
                <td>${value.product_quantity}</td>
                <td>
                 ${value.status == 1
                  ?` <span class="badge badge-success">Active</span>`
                  :`<span class="badge badge-danger">Deactive</span>`
                 }
                 
                </td>
                <td>
                  <form method="post" action="">
                    @csrf
                    <input type="hidden" value="" name="product_id">
                  <button type="button" class="btn btn-success btn-sm"  onclick="editdata(${value.id})"><i class="fa fa-edit">//</i><i class="fa fa-eye"></i></button>
                 
                  ${value.status == 1 
                    ?` <button type="button" id="down" data-id="${value.id}" class="btn btn-primary btn-sm"><i class="fa fa-thumbs-up"></i></button>`
                    :`<button type="button" id="down" data-id="${value.id}" class="btn btn-warning btn-sm"><i class="fa fa-thumbs-down"></i></button>`
                  }
                  <button type="button" onclick="deletedata(${value.id})" data-id="${value.id}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                </form>
                </td> 
              </tr>
          `
        })
        $('tbody').html(rows)
      }
    })
  }
  productalldata();
</script>

<!-- script for add -->
<script>
  $(document).ready(function(){
    $('body').on('submit','#formdata',function(e){
      e.preventDefault();
      let formdata= new FormData($('#formdata')[0]);
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
      $.ajax({
        type:'POST',
        data:formdata,
        url:"/product",
        contentType: false,
        processData: false,
        success:function(response){
          $('#largemodal').modal('hide')
          productalldata();
          $('#category_id').val('')
          $('#brand_id').val('')
          $('#product_name').val('')
          $('#product_code').val('')
          $('#product_quantity').val('')
          $('#product_size').val('')
          $('#product_color').val('')
          $('#selling_price').val('')
          $('#video_link').val('')
          $('#summernote').val('')
          $('#discount_price').val('')
          $('#image_one').val('')
          $('#image_two').val('')
          $('#image_three').val('')
          $('#main_slider').val('')
          $('#mid_slider11').val('')
          $('#hot_deal').val('')
          $('#hot_new').val('')
          $('#trend').val('')
          $('#byeonegetone').val('')
          $('#best_rated').val('')
           const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })

          Toast.fire({
            icon: 'success',
            title: 'Data added succesfully'
          })

        }

      })
    })
  })
</script>





<!-- script for edit -->
<script>
  function editdata(id){
     $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $.ajax({
      type:"GET",
      datatype:'json',
      url:"/product/"+id+"/edit",
      success:function(response){
        $('#product_idd1').val(response[0]['id']);
        $('#product_name1').val(response[0]['product_name'])
        $('#product_code1').val(response[0]['product_code'])
        $('#Product_quantity1').val(response[0]['product_quantity'])
        $('#category_id1').val(response[0]['category_id'])
        $('#subcategory_id1').val(response[0]['subcategory_id'])
        $('#brand_id1').val(response[0]['brand_id'])
        $('#product_size1').val(response[0]['product_size'])
        $('#Product_color1').val(response[0]['product_color'])
        $('#video_link1').val(response[0]['video_link'])
        $('#selling_price1').val(response[0]['selling_price'])
        $('#discount_price1').val(response[0]['discount_price'])
        $('textarea#summernote2').val(response[0]['product_details'])
        $('#status1').val(response[0]['status'])
        $('#mid_slider1').html(`

                     <label class="ckbox">
               ${response[0]['mid_slider'] == 1
               ?`<input type="checkbox" id="mid_slder1" name="mid_slder" value="1" checked>
               <span>Mid Slider</span>
            </label>`
               :`<input type="checkbox" id="mid_slder1" name="mid_slder" value="1">
               <span>Mid Slider</span>
            </label>`
             }`)
                $('#best_rated1').html(`

                     <label class="ckbox">
               ${response[0]['best_rated'] == 1
               ?`<input type="checkbox" id="best_rated1" name="best_rated" value="1" checked>
               <span>Mid Slider</span>
            </label>`
               :`<input type="checkbox" id="best_rated1" name="best_rated" value="1">
               <span>Best Rated</span>
            </label>`
             }`)

            $('#byeonegetone1').html(`

                     <label class="ckbox">
               ${response[0]['byeonegetone'] == 1
               ?`<input type="checkbox" id="byeonegetone1" name="byeonegetone" value="1" checked>
               <span>Mid Slider</span>
            </label>`
               :`<input type="checkbox" id="byeonegetone1" name="byeonegetone" value="1">
               <span>Byeonegetone</span>
            </label>`
             }`)

            $('#main_slider1').html(`

                     <label class="ckbox">
               ${response[0]['main_slider'] == 1
               ?`<input type="checkbox" id="main_slider1" name="midmain_slider_slder" value="1" checked>
               <span>Mid Slider</span>
            </label>`
               :`<input type="checkbox" id="main_slider1" name="main_slider" value="1">
               <span>Main Slider</span>
            </label>`
             }`)
            $('#hot_new1').html(`

                     <label class="ckbox">
               ${response[0]['hot_new'] == 1
               ?`<input type="checkbox" id="hot_new1" name="hot_new" value="1" checked>
               <span>Mid Slider</span>
            </label>`
               :`<input type="checkbox" id="hot_new1" name="hot_new" value="1">
               <span>Hot New</span>
            </label>`
             }`)
                    $('#trend1').html(`

                     <label class="ckbox">
               ${response[0]['trend'] == 1
               ?`<input type="checkbox" id="trend1" name="trend" value="1" checked>
               <span>Mid Slider</span>
            </label>`
               :`<input type="checkbox" id="trend1" name="trend" value="1">
               <span>Trend</span>
            </label>`
             }`)
                   
                    $('#image_one1').html(`
                     <div class="form-group">
                  <label id="image_one" class="form-control-label"> Old image one (main slider)<span class="tx-danger">*</span></label>
                  <input id="image_one1" class="form-control" type="file" id="file" name="image_one" onchange="readURL(this)" value="$product->image_one">
                  <img src="product_images/${response[0]['image_one']}" width="120">
                </div> 
                      `)
                    $('#image_two2').html(`
                     <div class="form-group">
                  <label id="image_two" class="form-control-label"> Old image one (main slider)<span class="tx-danger">*</span></label>
                  <input id="image_two1" class="form-control" type="file" id="file" name="image_two" onchange="readURL(this)" value="$product->image_one">
                  <img src="product_images/${response[0]['image_two']}" width="120">
                </div> 
                      `)
                    $('#image_three3').html(`
                     <div class="form-group">
                  <label id="image_three" class="form-control-label"> Old image one (main slider)<span class="tx-danger">*</span></label>
                  <input id="image_three3" class="form-control" type="file" id="file" name="image_three" onchange="readURL(this)" value="$product->image_one">
                  <img src="product_images/${response[0]['image_three']}" width="120">
                </div> 
                      `)
      
        $('#modal1').modal('show')
      }
    })
  }
</script>




<!-- script for update -->

<script>
  $(document).ready(function(){
    $('body').on('submit','#updateform',function(e){
      e.preventDefault();
      let formdata= new FormData($('#updateform')[0]);
        $.ajaxSetup({
           headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
            });
      $.ajax({
        type:'POST',
        data:formdata,
        url:"/product/updated",
        contentType: false,
        processData: false,
        success:function(response){
          console.log(response)
          productalldata();
          $('#category_id1').val('')
          $('#brand_id1').val('')
          $('#name1').val('')
          $('#product_code1').val('')
          $('#product_quantity1').val('')
          $('#product_size1').val('')
          $('#product_color1').val('')
          $('#selling_price1').val('')
          $('#video_link1').val('')
          $('#summernote1').val('')
          $('#discount_price1').val('')
          $('.fileone1').val('')
          $('.filetwo1').val('')
          $('.three1').val('')
          $('#main_slider1').val('')
          $('#mid_slider1').val('')
          $('#hot_deal1').val('')
          $('#hot_new1').val('')
          $('#trend').val('')
          $('#byeonegetone1').val('')
          $('#best_rated1').val('')
          $('#modal1').modal('hide')
           const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })

          Toast.fire({
            icon: 'success',
            title: 'Data updated succesfully'
          })
        }

      })
    })
  })
</script>





<script>
 $(document).ready(function(){
  $('body').on('click','#down',function(){
    let id=$(this).data('id');
    $.ajax({
      type:'GET',
      datatype:'json',
      url:"/product/status/updated/"+id,
      success:function(response){
        productalldata();
         const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })

          Toast.fire({
            icon: 'success',
            title: 'Status updated succesfully'
          })
      }
    })
  })
 })
</script>









<!-- script for delete -->
<script>
  function deletedata(id){
    const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $.ajax({

      type:'DELETE',
      datatype:'json',
      url:"/product/"+id,
      success:function(){
      swalWithBootstrapButtons.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    ).then((result)=>{
 productalldata();
    })

      }
})
 
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelled',
      'Your imaginary file is safe :)',
      'error'
    )
  }
})
  }

</script>










@endsection