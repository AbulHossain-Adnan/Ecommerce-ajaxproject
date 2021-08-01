@extends('admin.admin_layout')

@section('adminMain')


<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Tables</a>
        <span class="breadcrumb-item active">Data Table</span>
        </nav>
<div class="row">
  <div class="col-sm-8">
    <div class="card">
      <div class="card-body">
         <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Category List
               
            </h6>
          
            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap text-center">
                    <thead>
                        <tr>
                            <th class="wd-15p">Id</th>
                            <th class="wd-15p">Category Name</th>
                            <th class="wd-15p">Category Id</th>
                            <th class="wd-20p">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                     
                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title" id="addtitle">Subcategory Add</h5>
        <h5 class="card-title" id="updatetitle">Subcategory update</h5>
      
          <div class="form-group">
            <label for="exampleInputEmail1">Sub_category Name</label>
            <span class="text-danger" id="name_error"></span>
            <input type="hidden" id="id">
            <input type="text" class="form-control" id="sub_category_name" aria-describedby="emailHelp" >
           
          </div>
          <div class="form-group">
            <span class="text-danger" id="id_error"></span>
            <select class="form-control select2" data-placeholder="Choose country" id="category_id">
                    <option label="Choose category"></option>

                        @foreach ($categories as $item)
                        
                    <option id="category_id" value="{{$item->id}}">{{$item->category_name}}</option>

                    @endforeach
                 
                  </select>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          <button type="submit" class="btn btn-primary btn-sm" onclick="addbtn()" id="subbtn">Submit</button>
          <button type="submit" class="btn btn-warning btn-sm" id="upbtn" onclick="updata()">Update</button>
  
       
      </div>
    </div>
  </div>
</div>



     
    </div>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->

<script type="text/javascript">
    

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

 $("#addtitle").show();
   $("#subbtn").show();
  $("#updatetitle").hide();
   $("#upbtn").hide();



function alldata(){

  $.ajax({
    type:"GET",
    datatype:"json",
    url:"/sub_category/alldata",
    success:function(response){
      let data=""

        $.each(response, function(key,value){
      data = data + "<tr>"
      data = data + "<td>"+value.id+"</td>"
      data = data + "<td>"+value.sub_category_name+"</td>"
      data = data + "<td>"+value.category_id +"</td>"
      data = data + "<td>"
      data= data +"<button class='btn btn-primary btn-sm' onclick='editData("+value.id+")'>edit</button>"
      data= data +"<button class='btn btn-danger btn-sm' onclick='deletedata("+value.id+")'>delete</button>"
      data = data + "</td>"
      data = data + "</tr>"
    })
 $('tbody').html(data);
    }

  })
}
alldata();




// End Read data*****************************************
function cleardata(){
    $("#sub_category_name").val('');
    $("#category_id").val('');
    $("#name_error").text('');
    $('#id_error').text('');
}

// // Start create data************************************












   function addbtn(){


    var sub_category_name=$("#sub_category_name").val();
    var category_id=$("#category_id").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    $.ajax({
        type:"POST",
        datatype:"json",
        data:{sub_category_name:sub_category_name,category_id:category_id},
        url:"/subcategory/store/",
        success:function(data){
            Swal.fire({
                toast:true,
              position: 'top-end',
              icon: 'success',
              title: 'data added successfully',
              showConfirmButton: false,
              timer: 1500
            })
            alldata();
            cleardata();
            
        },
        error:function(error){
            $('#name_error').text(error.responseJSON.errors.sub_category_name);
      $("#id_error").text(error.responseJSON.errors.category_id);
    
        }
    })
  }

   

   // End create data*****************************************

function editData(id){
 $("#addtitle").hide();
   $("#subbtn").hide();
  $("#updatetitle").show();
   $("#upbtn").show();
     $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

$.ajax({
    type:"GET",
    datatype:"json",
    url:"/subcategory/edit/"+id,
    success:function(data){
        $("#id").val(data.id);
        $("#sub_category_name").val(data.sub_category_name);
        $("#category_id").val(data.category_id);



    }

})
}

function updata(){

     $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 let sub_category_name=$("#sub_category_name").val();
    let category_id=$("#category_id").val();
    let id =$("#id").val()

     $.ajax({
        type:"GET",
        datatype:"json",
         data:{sub_category_name:sub_category_name,category_id:category_id},
         url:"/subcategory/update/"+id,
         success:function(data){
             Swal.fire({
                toast:true,
              position: 'top-end',
              icon: 'success',
              title: 'data updated successfully',
              showConfirmButton: false,
              timer: 1500
            });
            alldata();
            cleardata();
             $("#addtitle").show();
             $("#subbtn").show();
             $("#updatetitle").hide();
            $("#upbtn").hide();

         }
     })

}




function deletedata(id){



$.ajax({
type:"GET",
datatype:"json",
url:"/subcategory/delete/"+id,
success:function(data){
  alldata()

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
  title: 'data deleted successfully'
})

}

})

}










// function deletedata($id){

// swal({
//   title: "Are you sure?",
//   text: "Once deleted, you will not be able to recover this imaginary file!",
//   icon: "warning",
//   buttons: true,
//   dangerMode: true,
// })
// .then((willDelete) => {
//   if (willDelete) {
//      $.ajax({
//     type:"GET",
//     datatype:"json",
//     url:"/subcategory/delete/"+$id,
//     success:function(data){
//         alldataa();

//     }
//    })
//     swal("Poof! Your imaginary file has been deleted!", {
//       icon: "success",
//     });
//   } else {
//     swal("Your imaginary file is safe!");
//   }
// });








  
// }




</script>




@endsection