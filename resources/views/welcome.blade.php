@extends("layouts.app")
@section("style")
<style>
.accordion-one .card-header a:hover, .accordion-one .card-header a:focus {
    color: #666 !important;
}
.accordion-one .card-header a{
    color:#333;
}
</style>
@endsection
@section("content")
<div id="loading" class="d-none bg-white-6 bg-gray-200 mg-0 ht-100v wd-100p z-index-100 pos-fixed x-0 y-0 align-items-center">
    <div class="sk-circle">
        <div class="sk-circle1 sk-child"></div>
        <div class="sk-circle2 sk-child"></div>
        <div class="sk-circle3 sk-child"></div>
        <div class="sk-circle4 sk-child"></div>
        <div class="sk-circle5 sk-child"></div>
        <div class="sk-circle6 sk-child"></div>
        <div class="sk-circle7 sk-child"></div>
        <div class="sk-circle8 sk-child"></div>
        <div class="sk-circle9 sk-child"></div>
        <div class="sk-circle10 sk-child"></div>
        <div class="sk-circle11 sk-child"></div>
        <div class="sk-circle12 sk-child"></div>
    </div>
</div>
<div class="slim-header">
      <div class="container">
        <div class="slim-header-left">
          <h2 class="slim-logo"><a href="/"><abbr class="text-decoration-none" style="text-decoration:none" title="Tincan Island Container Terminal">TICT</abbr><span></span></a></h2>
        </div><!-- slim-header-left -->
        <div class="slim-header-right">
            <h2 class="slim-logo text-break">Export arrival notification</h2>
        </div><!-- header-right -->
      </div><!-- container -->
    </div><!-- slim-header -->

    <div class="slim-mainpanel">
        <div class="container">
            <div class="slim-pageheader">
            <ol class="breadcrumb slim-breadcrumb">
            </ol>
            <h6 class="slim-pagetitle">Export Arrival Notification Form</h6>
        </div>
        <div class="section-wrapper">
          <p class="mg-b-20 mg-sm-b-40">Please enter all information correctly.</p>
          <div class="form-layout">
            <div class="row mg-b-25">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" id="agent" placeholder="Enter your name">
                        <div  class="invalid-feedback"></div>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-12">
                    <div class=" mg-t-20">
                        <label class="section-title">Containers</label>
                        <p class=" mg-r-50">Add individual booking information or upload an Excel sheet of all booking information using <a>this</a></p>
                        <p class="tx-danger mg-b-20 mg-sm-b-40 mg-r-50"><span id="bookingInfoErrors"></span></p>
                        <div class="d-flex pos-absolute flex-column r-30 t-25 gx-1 gy-1 justify-content-between">
                            <button class="btn btn-outline-primary btn-icon mb-1 rounded-circle"
                                data-toggle="tooltip-primary"
                                data-target="#bookingInfoModal"
                                data-placement="left"
                                title="add booking information"
                                onclick="showAddBookingInfoForm()"
                            >
                                <div><i class="fa fa-plus"></i></div>
                            </button>
                            <div style="width:.2rem"> </div>
                            <!-- <button
                                class="btn btn-outline-primary btn-info btn-icon mt-1 rounded-circle"
                                data-toggle="tooltip-primary"
                                data-target="#bookingInfoModal"
                                data-placement="left"
                                title="Upload in batch with an excel file"
                                onclick="showAddBatchBookingInfoForm()"
                                >
                                <div><i class="fa fa-file"></i></div>
                            </button> -->
                        </div>
                        <div class="table-responsive">
                            <table id="tictcontainers" class="table table-bordered table-colored table-primary">
                            <thead>
                                <tr>
                                    <th class="wd-10p">
                                    </th>
                                    <th class="wd-35p">Booking No</th>
                                    <th class="wd-35p">Container No</th>
                                    <th class="wd-35p">VGM</th>
                                    <th class="wd-35p">Vessel</th>
                                    <th class="wd-20p">Port Of Discharge</th>
                                    <th class="wd-20p">Commodity</th>
                                    <th class="wd-20p">Shipper</th>
                                    <th class="wd-20p">ISO</th>
                                    <th class="wd-20p">Operator</th>
                                </tr>
                            </thead>
                            <tbody id="bookingInformation">
                                <tr>
                                    <td class="wd-10p" colspan="10">
                                        <p class="">Snap an error occured with the javascript file</p>
                                    </td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                    </div><!-- table-wrapper -->
                </div>
            </div>
            <div class="form-layout-footer">
                <div class="d-flex gx-1 ">
                    <label class="ckbox">
                        <input type="checkbox" id="terms"><span>&nbsp;</span>
                    </label>
                    <span id="terms-error">I have read and agree to the <a data-toggle="modal" data-target="#termsModal" href="#" class="text-primary">terms and conditions</a></span>
                </div>
                <button class="btn btn-primary bd-0" id="notificationSubmit" disabled>Submit Form</button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </div>
      </div><!-- container -->
    </div><!-- slim-mainpanel -->

    <div class="slim-footer">
      <div class="container">
        <p>Copyright 2022 &copy; All Rights Reserved. TICT Lagos.</p>
        <!-- <p>Designed by: <a href="">ThemePixels</a></p> -->
      </div><!-- container -->
    </div><!-- slim-footer -->

    <!-- MODAL GRID -->
    <div id="bookingInfoModal" class="modal fade effect-slide-in-right">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content bd-0 bg-transparent rounded overflow-hidden">
                <div class="modal-body pd-0">
                    <div class=" bg-white">
                        <div class="pd-y-30 pd-x-20 pd-xl-x-30">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="pd-x-30 pd-t-10">
                                <h3 class="tx-gray-800 tx-normal mg-b-15">Add Booking Information</h3>
                                <div class="form-layout">
                                    <div class="row mg-b-25">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-group" id="form-bookingNo">
                                                <label class="form-control-label">Booking No : <span class="tx-danger">*</span></label>
                                                <input type="text" name="email" style="text-transform:uppercase" onchange="validateBookingField('form-bookingNo')" class="form-control" placeholder="Enter your booking number">
                                                <div class="invalid-feedback"></div>
                                            </div><!-- form-group -->
                                        </div><!-- col-4 -->
                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-group" id="form-containerNo">
                                                <label class="form-control-label" >container No : <span class="tx-danger">*</span></label>
                                                <input type="text" name="" style="text-transform:uppercase" onkeyup="validateBookingField('form-containerNo')" class="form-control" placeholder="Enter your container number">
                                                <div class="invalid-feedback"></div>
                                            </div><!-- form-group -->
                                        </div><!-- col-4 -->
                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-group" id="form-vgm">
                                                <label class="form-control-label">VGM : <span class="tx-danger">*</span></label>
                                                <input step="1" pattern="/d+" onkeyup="validateBookingField('form-vgm')" style="text-transform:uppercase" type="number" name="" class="form-control" placeholder="Enter your VGM">
                                                <div class="invalid-feedback"></div>
                                            </div><!-- form-group -->
                                        </div><!-- col-4 -->
                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-group " id="form-vessel">
                                                <label class="form-control-label">Vessel : <span class="tx-danger">*</span></label>
                                                <input style="text-transform:uppercase" type="text" name="" class="form-control"onchange="validateBookingField('form-vessel')" placeholder="Enter your vessel">
                                                <div class="invalid-feedback"></div>
                                            </div><!-- form-group -->
                                        </div><!-- col-4 -->
                                        <div class="col-md-6 col-lg-4">

                                            <div class="form-group" id="form-portOfDischarge">
                                                <label class="form-control-label">Port of discharge : <span class="tx-danger">*</span></label>
                                                <input style="text-transform:uppercase" type="text" name="" onchange="validateBookingField('form-portOfDischarge')" class="form-control" placeholder="Enter your port of discharge">
                                                <div class="invalid-feedback"></div>
                                            </div><!-- form-group -->
                                        </div><!-- col-4 -->
                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-group " id="form-commodity">
                                                <label class="form-control-label">Commodity : <span class="tx-danger">*</span></label>
                                                <input style="text-transform:uppercase" type="text" name=""onchange="validateBookingField('form-commodity')"  class="form-control" placeholder="Enter your commodity">
                                                <div class="invalid-feedback"></div>
                                            </div><!-- form-group -->
                                        </div><!-- col-4 -->
                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-group" id="form-shipper">
                                                <label class="form-control-label">Shipper : <span class="tx-danger">*</span></label>
                                                <input style="text-transform:uppercase" type="text" name="" onchange="validateBookingField('form-shipper')" class="form-control" placeholder="Enter your shipper">
                                                <div class="invalid-feedback"></div>
                                            </div><!-- form-group -->
                                        </div><!-- col-4 -->
                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-group" id="form-iso">
                                                <label class="form-control-label">ISO : <span class="tx-danger">*</span></label>
                                                <div class="form-group mg-b-0">
                                                    <select class="form-control select2" onchange="validateBookingField('form-iso','select')" data-placeholder="Choose ISO">
                                                        <option value="">Select ISO</option>
                                                        @foreach ($iso as $data )
                                                            <option value="{{$data->id}}">{{$data->name}} {{$data->code}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                            </div><!-- form-group -->
                                        </div><!-- col-4 -->
                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-group mg-b-20" id="form-operator">
                                                <label class="form-control-label">Operator : <span class="tx-danger">*</span></label>
                                                <div class="form-group mg-b-0">
                                                    <select class="form-control select2" onchange="validateBookingField('form-operator','select')" data-placeholder="Select your Operator">
                                                        <option value="">Select Operator</option>
                                                            @foreach ($operator as $data )
                                                                <option value="{{$data->id}}">{{$data->name}}</option>
                                                            @endforeach
                                                    </select>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                            </div><!-- form-group -->
                                        </div><!-- col-4 -->
                                        <div class="col-12">
                                            <button class="btn btn-primary btn-block" id="submit" onclick="newBookingInfo()">Add</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- pd-20 -->
                    </div><!-- col-6 -->
                </div><!-- modal-body -->
            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->

    <!-- MODAL GRID -->
    <div id="bookingInfoUploadModal" class="modal fade effect-slide-in-right">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content bd-0 bg-transparent rounded overflow-hidden">
                <div class="modal-body pd-0">
                    <div class=" bg-white">
                        <div class="pd-y-30 pd-x-20 pd-xl-x-30">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="pd-x-30 pd-t-10">
                                <h3 class="tx-gray-800 tx-normal mg-b-15">Upload Booking Information</h3>
                                <div class="form-layout">
                                    <div class="row mg-b-25">
                                        <div class="col-12">
                                            <div class="custom-file  mg-b-10">
                                                <input type="file" class="custom-file-input" id="customFile2">
                                                <label class="custom-file-label custom-file-label-primary" for="customFile">Upload Excel file</label>

                                            </div><!-- custom-file -->
                                        </div><!-- col-4 -->
                                        <!-- results will be displayed here  -->
                                        <div id="excelBookings" class="col-12">
                                            <div id="accordion2" class="accordion-one" role="tablist" aria-multiselectable="true">
                                                <div class="card">
                                                    <div class="card-header bg-success" role="tab" id="headingOne2">
                                                        <a data-toggle="collapse" data-parent="#accordion2" href="#collapseOne2" aria-expanded="true" aria-controls="collapseOne2" class="tx-gray-800 transition">
                                                            <div class="d-flex justify-content-between align-items-center flex-wrap mg-r-20">
                                                                UQTNUUB126673
                                                                <span class=" tx-12 tx-semibold">Passed <i class="fa fa-check"></i></span>
                                                            </div>
                                                        </a>
                                                    </div><!-- card-header -->
                                                    <div id="collapseOne2" class="collapse show" role="tabpanel" aria-labelledby="headingOne2">
                                                        <div class="card-body">
                                                        A concisely coded CSS3 button set increases usability across the board, gives you a ton of options, and keeps all the code involved to an absolute minimum. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-header bg-danger tx-white" role="tab" id="headingOne2">
                                                        <a data-toggle="collapse" data-parent="#accordion2" href="#collapseOne2" aria-expanded="true" aria-controls="collapseOne2" class="tx-gray-800 transition">
                                                            <div class="d-flex justify-content-between align-items-center flex-wrap mg-r-20">
                                                                UQTNUUB126673
                                                                <span class=" tx-12 tx-semibold">Failed <i class="fa fa-times"></i></span>
                                                            </div>
                                                        </a>
                                                    </div><!-- card-header -->
                                                    <div id="collapseOne2" class="collapse show" role="tabpanel" aria-labelledby="headingOne2">
                                                        <div class="card-body">
                                                        A concisely coded CSS3 button set increases usability across the board, gives you a ton of options, and keeps all the code involved to an absolute minimum. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.
                                                        </div>
                                                    </div>
                                                </div>

                                            </div><!-- accordion -->
                                        </div>
                                        <div class="col-12">
                                            <div class="d-flex justify-content-between  mg-t-10 mg-b-10">
                                                <button class="btn btn-success" id="submit" onclick="newBookingInfo()">Add Passed</button>
                                                <button class="btn btn-secondary" id="submit" data-dismiss="modal" onclick="newBookingInfo()">Cancel</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- pd-20 -->
                    </div><!-- col-6 -->
                </div><!-- modal-body -->
            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->

    <div id="termsModal" class="modal fade" aria-hidden="true" style="display: none;">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
          <div class="modal-body pd-20">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <h5 class=" lh-3 mg-b-20"><a href="" class="tx-inverse hover-primary">TICT Terms</a></h5>
            <p class="mg-b-5">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. </p>
          </div><!-- modal-body -->
          <button type="button" class="btn btn-info pd-x-25" data-dismiss="modal" aria-label="Close">Close</button>

        </div>
      </div><!-- modal-dialog -->
    </div>

    <!-- Success Modal  -->
    <div id="successModal" class="modal fade">
      <div class="modal-dialog" role="document">
        <div class="modal-content tx-size-sm">
          <div class="modal-body tx-center pd-y-20 pd-x-20">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <i class="icon ion-ios-checkmark-outline tx-100 tx-success lh-1 mg-t-20 d-inline-block"></i>
            <h4 class="tx-success tx-semibold mg-b-20">Successful!</h4>
            <p class="mg-b-20 mg-x-20">Export arrival notification saved successfully</p>
            <button type="button" class="btn btn-success pd-x-25" data-dismiss="modal" aria-label="Close">Continue</button>
          </div><!-- modal-body -->
        </div><!-- modal-content -->
      </div><!-- modal-dialog -->
    </div>
    <!-- Success Modal End -->

    <!-- Error Modal  -->
    <div id="errorModal" class="modal fade">
      <div class="modal-dialog" role="document">
        <div class="modal-content tx-size-sm">
          <div class="modal-body tx-center pd-y-20 pd-x-20">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <i class="icon icon ion-ios-close-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
            <h4 class="tx-danger mg-b-20">Error: Snap something went wrong!</h4>
            <p class="mg-b-20 mg-x-20">An error occured while saving. Please try again</p>
            <button type="button" class="btn btn-danger pd-x-25" data-dismiss="modal" aria-label="Close">Continue</button>
          </div><!-- modal-body -->
        </div><!-- modal-content -->
      </div><!-- modal-dialog -->
    </div>
    <!-- Error Modal End -->

@endsection
@section("innerscript")
<script>
    window.globalIsos= {{Illuminate\Support\Js::from($iso)}};
    window.globalOperators = {{Illuminate\Support\Js::from($operator)}}
    $(function(){
        'use strict';

        // Initialize tooltip
        $('[data-toggle="tooltip"]').tooltip();

        // colored tooltip

        $('[data-toggle="tooltip-primary"]').tooltip({
          template: '<div class="tooltip tooltip-primary" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
        });

        $('[data-toggle="tooltip-primary modal"]').tooltip({
          template: '<div class="tooltip tooltip-primary" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
        });
      });
</script>
@endsection
