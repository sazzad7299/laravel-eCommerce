@extends('layouts.adminLayout.admin_design')
@section('content')

  <div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Product</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Product</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
  </div>
    <div class="container-fluid">
      <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('admin/edit-banner/'.$bannerDetails->id) }}" name="edit_banner" id="edit_banner" novalidate="novalidate">{{ csrf_field() }}
        <div class="row">
              <div class="col-md-8">
                  <div class="card">
                    <div class="card-body">
                      @if(Session::has('flash_message_error'))
                      <div class="alert alert-error alert-block">
                          <button type="button" class="close" data-dismiss="alert">×</button> 
                              <strong>{!! session('flash_message_error') !!}</strong>
                      </div>
                      @endif   
                      @if(Session::has('flash_message_success'))
                          <div class="alert alert-success alert-block">
                              <button type="button" class="close" data-dismiss="alert">×</button> 
                                  <strong>{!! session('flash_message_success') !!}</strong>
                          </div>
                      @endif
                    </div>
                      <div class="card-body">
                          <div class="form-group row">
                              <label for="fname" class="col-sm-3 text-right control-label col-form-label">Banner Heading(h1):</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="title" value="{{ $bannerDetails->title }}"  required="true">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="fname" class="col-sm-3 text-right control-label col-form-label">Banner Text(p)</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="link" id="link" value="link" required="true">
                              </div>
                          </div>
                          <div class="form-group row">
                            <input type="hidden" name="current_image" value="{{ $bannerDetails->image }}">
                            <label class="col-sm-3 text-right control-label col-form-label">Banner Image</label>
                            <div class="col-sm-9">
                              <input name="image" id="image" type="file" size="19" >  
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Banner Text Position</label>
                            <div class="col-sm-9">
                                <select name="position" id="position" class="form-control">
                                    <option value="0"  @if($bannerDetails->position==0) selected @endif>MIDDLE</option>
                                    <option value="1" @if($bannerDetails->position==1) selected @endif>TOP-LEFT</option>
                                    <option value="2" @if($bannerDetails->position==2) selected @endif>TOP-RIGHT</option>
                                    <option value="3" @if($bannerDetails->position==3) selected @endif>BUTTOM-LEFT</option>
                                    <option value="4" @if($bannerDetails->position==4) selected @endif>BUTTOM-RIGHT</option>
                                    
                                </select>
                            </div>
                        </div>
                          
                          <div class="form-group row">
                              <label for="fname" class="col-sm-3 text-right control-label col-form-label">Enable:</label>
                              <div class="col-sm-9">
                                  <input class="mt-2" type="checkbox"  name="status" id="status" value="1" @if($bannerDetails->status=="1") checked @endif >
                              </div>
                          </div>
                          <div class="border-top">
                              <div class="card-body">
                                  <input type="submit" class="btn btn-primary" value="Update Banner">
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </form>   
  </div>
  </div>

@endsection