@extends('layouts.admin.main')
@section('content')
    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content-tab">

            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                           
                            <h4 class="page-title"> تعديل العرض  </h4>
                        </div>
                        <!--end page-title-box-->
                    </div>
                    <!--end col-->
                    @include('layouts.success')
                    @include('layouts.error')
                </div>
                <!-- end page title end breadcrumb -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                             
                            <div class="card-body p-0">
                                <!-- Nav tabs -->
                               

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane p-3 active" id="Post" role="tabpanel">
                                     <form name="" method="post" action="{{ route('admin.carousel.edit') }}"   enctype= "multipart/form-data" >
                                     @csrf
                                     <input   type="text" name="id" value="{{$carousel->id}}"  style="display:none;">

                                     <div class="row">
                                        <div class="mb-4 row">
                                            <label for="example-text-input" class="col-sm-1 col-form-label text-end"> العنوان  </label>
                                            <div class="col-sm-6">
                                            @error('title')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                                <input class="form-control" name="title" type="text" value="{{$carousel->title}}" id="example-text-input" maxlength="50">
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="example-text-input" class="col-sm-1 col-form-label text-end"> العنوان باللغة الانجليزية </label>
                                            <div class="col-sm-6"> 
                                                <input class="form-control" name="title_en" type="text" value="{{$carousel->title_en}}" id="example-text-input" maxlength="50">
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="example-text-input" class="col-sm-1 col-form-label text-end"> عنوان فرعي  </label>
                                            <div class="col-sm-6">
                                            
                                                <input class="form-control" name="subtitle" type="text" value="{{$carousel->subtitle}}" id="example-text-input" maxlength="50">
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="example-text-input" class="col-sm-1 col-form-label text-end"> عنوان فرعي باللغة الانجليزية </label>
                                            <div class="col-sm-6">
                                            
                                                <input class="form-control" name="subtitle_en" type="text" value="{{$carousel->subtitle_en}}" id="example-text-input" maxlength="50">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                        
                                        <label   class="col-sm-1 col-form-label text-end">الوصف</label>
                                        <div class="col-sm-9">
                                        @error('text')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                        <textarea class="form-control" name="text" rows="5" maxlength="300" >{{$carousel->text}}</textarea>                                            </div>
                                    </div>
                                    <div class="mb-3 row">
                                        
                                        <label   class="col-sm-1 col-form-label text-end">الوصف باللغة الانجليزية</label>
                                        <div class="col-sm-9">
                                        
                                        <textarea class="form-control" name="text_en" rows="5" maxlength="300" >{{$carousel->text_en}}</textarea>                                            </div>
                                    </div>
                                    <div class="mb-4 row">
                                            <label for="example-text-input" class="col-sm-1 col-form-label text-end">    رابط تسوق الان  </label>
                                            <div class="col-sm-6">
                                            
                                                <input class="form-control" name="link" type="text" value="{{$carousel->link}}" id="example-text-input" maxlength="50">
                                            </div>
                                        </div>
                                    <div class="mb-3 row">
                                             <div class="col-sm-9">
                                            @if($carousel->image)
                                            <img src="{{asset('/storage/property/'.$carousel->image)}}"   alt="{{$carousel->title}}" width="100">
                                            @endif
                                            </div>
                                        </div>
                                    <div class="mb-3 row">
                                       
                                            <label   class="col-sm-1 col-form-label text-end">الصورة الرئيسية</label>
                                            <div class="col-sm-9">
                                            @error('image')
                                            <small class="form-text text-danger">{{$message}}</small>
                                            @enderror
                                            <input type="file" name="image" class="form-control"   />   
                                             </div>
                                        </div> 
                                        </div><!--end row-->
                                        <div class="form-group mb-3 row">
                                        <div class="col-lg-9 col-xl-8 offset-lg-3">
                                            <button type="submit" class="btn btn-primary">
                                                تعديل
                                            </button>
                                             
                                        </div>
                                        </div>
                                    </form>
                                    </div>
                                    <div class="tab-pane p-3" id="Gallery" role="tabpanel">
                                        <div class="row">

                                        </div><!--end row-->

                                    </div>
                                    
                                </div>
                            </div> <!--end card-body-->
                        </div><!--end card-->
                    </div><!--end col-->
                </div><!--end row-->

            </div><!-- container -->

            <!--Start Rightbar-->
            <!--Start Rightbar/offcanvas-->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="Appearance" aria-labelledby="AppearanceLabel">
                <div class="offcanvas-header border-bottom">
                    <h5 class="m-0 font-14" id="AppearanceLabel">Appearance</h5>
                    <button type="button" class="btn-close text-reset p-0 m-0 align-self-center"
                            data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <h6>Account Settings</h6>
                    <div class="p-2 text-start mt-3">
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="settings-switch1">
                            <label class="form-check-label" for="settings-switch1">Auto updates</label>
                        </div><!--end form-switch-->
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="settings-switch2" checked>
                            <label class="form-check-label" for="settings-switch2">Location Permission</label>
                        </div><!--end form-switch-->
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="settings-switch3">
                            <label class="form-check-label" for="settings-switch3">Show offline Contacts</label>
                        </div><!--end form-switch-->
                    </div><!--end /div-->
                    <h6>General Settings</h6>
                    <div class="p-2 text-start mt-3">
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="settings-switch4">
                            <label class="form-check-label" for="settings-switch4">Show me Online</label>
                        </div><!--end form-switch-->
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="settings-switch5" checked>
                            <label class="form-check-label" for="settings-switch5">Status visible to all</label>
                        </div><!--end form-switch-->
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="settings-switch6">
                            <label class="form-check-label" for="settings-switch6">Notifications Popup</label>
                        </div><!--end form-switch-->
                    </div><!--end /div-->
                </div><!--end offcanvas-body-->
            </div>
            <!--end Rightbar/offcanvas-->
            <!--end Rightbar-->


        </div>
        <!-- end page content -->
    </div>

@endsection
@push('js')

@endpush