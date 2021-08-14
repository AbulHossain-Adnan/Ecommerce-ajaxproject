@extends('admin.admin_layout')

@section('adminMain')
  <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Forms</a>
        <span class="breadcrumb-item active">Form Layouts</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Form Layouts</h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-20">
          <h6 class="card-body-title">Top Label Layout</h6>
         
<form method="post" action="{{route('seo.store')}}">
	@csrf
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-7">
                <div class="form-group">
                  <label class="form-control-label">Meta Title <span class="tx-danger">*</span></label>
                  {{$seos->meta_tag}}
                  <input type="hidden" name="id" value="{{$seos->id}}">
                  <input class="form-control" type="text" name="meta_title" value="{{$seos->meta_title}}" placeholder="Enter firstname">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-7">
                <div class="form-group">
                  <label class="form-control-label">Meta Author: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="meta_author" value="{{$seos->meta_author}}" placeholder="Enter lastname">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-7">
                <div class="form-group">
                  <label class="form-control-label">meta Tag: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="meta_tag" value="{{$seos->meta_tag}}" placeholder="Enter email address">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-7">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Meta Description: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="meta_description" value="{{$seos->meta_description}}">
                </div>
              </div><!-- col-8 -->
                <div class="col-lg-7">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Google Analytics: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="google_analytics" value="{{$seos->google_analytics}}">
                </div>
              </div><!-- col-8 -->
               <div class="col-lg-7">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Bing Analytics: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="bing_analyticst" value="{{$seos->bing_analyticst}}">
                </div>
              </div><!-- col-8 -->
              <!-- col-4 -->
            </div><!-- row -->

            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5">Submit Form</button>
           </form>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </div><!-- card -->

    

    

      </div><!-- sl-pagebody -->
      <footer class="sl-footer">
        <div class="footer-left">
          <div class="mg-b-2">Copyright &copy; 2017. Starlight. All Rights Reserved.</div>
          <div>Made by ThemePixels.</div>
        </div>
        <div class="footer-right d-flex align-items-center">
          <span class="tx-uppercase mg-r-10">Share:</span>
          <a target="_blank" class="pd-x-5" href="https://www.facebook.com/sharer/sharer.php?u=http%3A//themepixels.me/starlight"><i class="fa fa-facebook tx-20"></i></a>
          <a target="_blank" class="pd-x-5" href="https://twitter.com/home?status=Starlight,%20your%20best%20choice%20for%20premium%20quality%20admin%20template%20from%20Bootstrap.%20Get%20it%20now%20at%20http%3A//themepixels.me/starlight"><i class="fa fa-twitter tx-20"></i></a>
        </div>
      </footer>
    </div><!-- sl-mainpanel -->


@endsection