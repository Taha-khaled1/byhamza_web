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
                             
                            <h4 class="page-title">معلومات عن الطلب</h4>
                        </div>
                        <!--end page-title-box-->
                    </div>
                    <!--end col-->
                </div>
               @include('layouts.success')
                @include('layouts.error')
                

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="met-profile">
                                    <div class="row">
                                        <div class="col-lg-4 align-self-center mb-3 mb-lg-0">
                                            <div class="met-profile-main">
                                                <div class="met-profile-main-pic">
                                                   
                                                </div>
                                                <div class="met-profile_user-detail">
                                                    <h5 class="met-user-name"> رقم الطلب #{{$order->number}} </h5>
                                                    <a href="{{ route('admin.order.shipping', $order->id)}}">
                                         @if($order->status == 1)
                                                                <button type="submit" class="btn btn-primary"> شحن</button>@endif
                                                               </a><hr>
                                                                 <a href="{{ route('admin.order.cancel', $order->id)}}">
                                         @if($order->status >= 1)
                                                                <button type="submit" class="btn btn-danger"> الغاء الطلب</button>@endif
                                                               </a>
                                                </div>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-4 ms-auto align-self-center">
                                            <ul class="list-unstyled personal-detail mb-0">
                                                
                                                <li class="mt-2"> 
                                                    <b> عدد المنتجات </b> : {{ $order->items->count() }}</li>
                                                        
                                                <li class="mt-2"> 
                                                    <b>  المجموع الجزئي   </b> :   {{ $order->total + $order->discount - $order->shipping}} د.إ
                                                </li>
                                               <li class="mt-2"> 
                                                    <b>الشحن</b> : {{$order->shipping}} د.إ
                                                </li>
                                                @if($order->discount > 0)
                                                <li class="mt-2"> 
                                                    <b>الخصم</b> :   {{ $order->discount}} د.إ
                                                </li>
                                                @endif
                                                <li class="mt-2"> 
                                                    <b> المجموع الكلي </b> :   {{ $order->total}} د.إ
                                                </li>
                                                                                      
                                                <li class="mt-2"> 
                                                    <b> طريقة الدفع </b>  :    @if($order->payment_method == "cash")
                                                                                الدفع عند الاستلام
                                                                                @else
                                                                                بطاقة ائتمان
                                                                                @if($order->payment )
                                                    @if($order->payment->status == 'pending' )                                                                              
                                                    <span class="badge bg-primary"> في انتظار الدفع</span>
                                                    @elseif($order->payment->status == 'completed')
                                                    <span class="badge bg-success">  تم الدفع</span>
                                                    @elseif($order->payment->status == 'failed')
                                                    <span class="badge bg-danger"> تم الغاء الدفع</span>
                                                    @else
                                                    <span class="badge bg-danger"> فشل الدفع</span>
                                                    @endif
                                                    @endif  @endif
                                                </li>
                                            </ul>

                                        </div><!--end col-->
                                     
                                    </div><!--end row-->
                                </div><!--end f_profile-->
                            </div><!--end card-body-->


                            <div class="card-body">
                            <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#Post" role="tab"
                                           aria-selected="true">المنتجات</a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#Settings" role="tab"
                                           aria-selected="false">العنوان / ملاحظات</a>
                                    </li>
                                </ul>

                            <div class="tab-content">
                              <div class="tab-pane p-3 active" id="Post" role="tabpanel">
                                <div class="table-responsive">
                                 <table id="example" class="table table-striped table-bordered" style="width:90%;">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>اسم المنتج</th>
                                         <th>رمز المنتج</th>
                                        <th>صورة المنتج</th> 
                                        <th>كمية المنتج</th>
                                        <th>السعر</th>
                                        <th>الاجمالي</th>
                                        <th>الحجم / اللون</th>
                                        
                                 
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order->items as $item)
                                    <tr  >
                                        <td>{{$loop->iteration}} </td>
                                        <td>{{$item->product_name}} </td>
                                        <td>{{$item->product->code}} </td>
                                        
                                        <td>
                                        @if($item->product->image)
                                        <img src="{{asset('/storage/property/'.$item->product->image)}}"   alt="{{$item->product->image}}" width="100">
                                        @endif 
                                        </td>
                                        <td>{{$item->quantity}} </td>
                                        <td>{{$item->product->price}}</td>
                                        <td>{{$item->product->price * $item->quantity}} </td>
                                        <td>الحجم /{{$item->options}} <br> اللون / <p  style="background-color:{{$item->color}}; color:{{$item->color}}; border-radius: 10%;" >*</p></td>
                                         
                                        </tr>
                                        @endforeach
                                    </tbody>
                                 </table>
                               
                                 </div>
                                 </div>
                                 <div class="tab-pane p-3" id="Settings" role="tabpanel">
                                        <div class="row">
                                        <div class="card">
                                         
                                        <div class="form-group mb-6 row">
                                                <label class="col-xl-1 col-lg-1 mb-lg-0 form-label">الاسم  </label>
                                                <div class="col-lg-9 col-xl-8">
                                                <label  > {{$address->name}} </label>

                                                </div>
                                            </div> 
                                            <div class="form-group mb-6 row">
                                                <label class="col-xl-1 col-lg-1 mb-lg-0 form-label">الايميل   </label>
                                                <div class="col-lg-9 col-xl-8">
                                                <label  > {{$address->email}} </label>

                                                </div>
                                            </div> 
                                            <div class="form-group mb-6 row">
                                                <label class="col-xl-1 col-lg-1 mb-lg-0 form-label">المنطقة  </label>
                                                <div class="col-lg-9 col-xl-8">
                                                <label  > {{$address->area}} </label>

                                                </div>
                                            </div> 
                                            <div class="form-group mb-6 row">
                                                <label class="col-xl-1 col-lg-1 mb-lg-0 form-label">الشارع  </label>
                                                <div class="col-lg-9 col-xl-8">
                                                <label  > {{$address->street}} </label>

                                                </div>
                                            </div> 
                                            <div class="form-group mb-6 row">
                                                <label class="col-xl-1 col-lg-1 mb-lg-0 form-label">الجادة  </label>
                                                <div class="col-lg-9 col-xl-8">
                                                <label  > {{$address->Blvd}} </label>

                                                </div>
                                            </div> 
                                            <div class="form-group mb-6 row">
                                                <label class="col-xl-2 col-lg-2 mb-lg-0 form-label">الشقة\المنزل  </label>
                                                <div class="col-lg-9 col-xl-8">
                                                <label  > {{$address->house}} </label>

                                                </div>
                                            </div> 
                                            <div class="form-group mb-6 row">
                                                <label class="col-xl-1 col-lg-1 mb-lg-0 form-label">رقم الهاتف  </label>
                                                <div class="col-lg-9 col-xl-8">
                                                <label  > {{$address->phone}} </label>

                                                </div>
                                            </div> 
                                            @if($order->nots)<hr>
                                 <div class="form-group mb-6 row">
                                                <label class="col-xl-1 col-lg-1 mb-lg-0 form-label">ملاحظات  </label>
                                                <div class="col-lg-9 col-xl-8">
                                                <label  > {{$order->nots}} </label>

                                                </div>
                                            </div> @endif
                                            </div>

                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->


            </div><!-- container -->


        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->


@endsection
@push('js')
 
@endpush