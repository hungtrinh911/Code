@extends('backend.layout')
@section('title', 'Thêm TourGuide')
@section('css')
      <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      
      <link href="{{asset("backend/plugins/timepicker/bootstrap-timepicker.min.css")}}" rel="stylesheet">
      <link href="{{asset("backend/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css")}}" rel="stylesheet">
      <link href="{{asset("backend/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css")}}" rel="stylesheet">
      <!-- <link href="{{asset("backend/plugins/bootstrap-datepicker/css/bootstrap-datepicker1.min.css")}}" rel="stylesheet">
      <link href="{{asset("backend/plugins/bootstrap-datepicker/css/bootstrap-datepicker2.min.css")}}" rel="stylesheet"> -->
      <link href="{{asset("backend/plugins/clockpicker/css/bootstrap-clockpicker.min.css")}}" rel="stylesheet">
      <link href="{{asset("backend/plugins/bootstrap-daterangepicker/daterangepicker.css")}}" rel="stylesheet">

      <link href="{{asset("backend/assets/css/bootstrap.min.css")}}" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="{{asset("backend/assets/css/bootstrap-example.min.css")}}" type="text/css">
      <link rel="stylesheet" href="{{asset("backend/assets/css/prettify.min.css")}}" type="text/css">
      <link rel="stylesheet" href="{{asset("backend/assets/css/photo.css")}}" type="text/css">
      <link rel="stylesheet" href="{{asset("backend/assets/css/custom.css")}}" type="text/css">

      <link href="{{asset("backend/assets/css/icons.css")}}" rel="stylesheet" type="text/css" />
      <link href="{{asset("backend/assets/css/style.css")}}" rel="stylesheet" type="text/css" />
      
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script type="text/javascript" src="{{asset("backend/assets/js/photo.js")}}"></script>
      <script type="text/javascript" src="{{asset("backend/assets/js/prettify.min.js")}}"></script>
      <script type="text/javascript" src="{{asset("backend/assets/js/photo.js")}}"></script>
      <link href="{{asset("backend/assets/css/bootstrap-multiselect.css")}}" rel="stylesheet" type="text/css" />
      <script type="text/javascript" src="{{asset("backend/assets/js/bootstrap-multiselect.js")}}"></script>
      <script  src="{{asset("backend/assets/js/modernizr.min.js")}}"></script>
      <script>
           $( function() {
           $( "#datepicker1" ).datepicker();
            } );
      </script>
@endsection

@section('content')

  
          <!-- ============================================================== -->
          <!-- Start right Content here -->
                  <div class="container-fluid">
                      <ul class="page-breadcrumb breadcrumb">
                        <li class="breadcrumb-item"><a href="{{action('Backend\BackendController@dashboard')}}"><i class="fa fa-home"></i>Bảng Tin</a></li>
                        <li class="breadcrumb-item"><a href="{{action('Backend\TourGuideController@index')}}">TourGuide</a></li>
                        <li class="breadcrumb-item active">Thêm mới tourGuide</li>
                      </ul>
                      <!-- Page-Title -->
                      <div class="portlet">
                       <div class="portlet-body">
                      <div class="row">
                           <div class="col-md-12">@include('backend.shared.flash-message')</div>
                              <div class="col-md-12">
                                    <form enctype= "multipart/form-data"  method="post" class="form-add" action="{{ action('Backend\TourGuideController@create') }}" >
                                       {{csrf_field()}}
                                  
                                      <div class="row">
                                      <div class="col-md-5">
                                           <div class="form-group row">
                                              <label class="col-md-3 col-form-label">Họ tên <span class="text-danger">(*)</span></label>
                                              <div class="col-9">
                                                 <input type="text" class="form-control" id='name' name="name" required
                                                 placeholder="" value="{{old('name')}}" />
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                                  <label for="" class="col-3 col-form-label m-t-15">Giới tính</label>
                                                  <div class="col-9 m-t-15"> 
                                                    <label class="radio-inline">
                                                      <input type="radio" name="sex" id="0" value="Nam">Nam
                                                  </label>
                                                  <label class="radio-inline">
                                                      <input type="radio" name="sex" id="1" value="Nữ">Nữ
                                                  </label>
                                                </div>
                                          </div>
                                      </div>
                                      <div class="col-md-5">
                                          <div class="form-group row">
                                             <label class="col-3 col-form-label">Ngày sinh</label>
                                             
                                             <div class="input-group col-9 ">
                                                  <input type="text" class="form-control" placeholder="mm/dd/yyyy" name="dob" id="datepicker-autoclose" value="{{old('dob')}}">
                                                  <div class="input-group-append col-md-3" >
                                                        <span class="input-group-text"><i class="md md-event-note"></i></span>
                                                  </div>
                                                
                                              </div><!-- input-group -->
                                            
                                          
                                        </div>
                                          <div class="form-group row">
                                             
                                                  <label for="" class="col-3 col-form-label m-t-15">Trạng thái</label>
                                                  <div class="col-9 m-t-15">
                                                      <input type="radio" name="status"  value="Hoạt động">Hoạt động
                                                      <input type="radio" name="status"  value="Tạm dừng">Tạm dừng
                                                  </div>
                                                      
                                             
                                          </div>
                                     </div>

                                     <div class="col-md-5 row">
                                        <label for="" class="col-3 col-form-label m-t-15">Hot <span class="text-danger">(*)</span></label>
                                        <div class="col-4 m-t-20">
                                          <label for="">
                                            <input id="4" type="radio" class="hot_tourguide" name="hot_tourguide" value="1" >
                                              Có
                                          </label>
                                          <label for="">
                                            <input id="4" type="radio" class="hot_tourguide" name="hot_tourguide" value="0">
                                               Không
                                          </label>
                                        </div>
                                     </div>
                                  </div>
                                  <div class="clearfix"></div>
                                     <!--end col-md-5-->
                                     <!-- img upload -->
                                     <div class="row">
                                          <div class="col-md-3">
                                            <div class="form-group">
                                                  <div class="main-img-preview">
                                                    <img class="thumbnail img-preview-1" src="{{asset("backend/assets/images/profile.png")}}" title="Preview Logo">
                                                  </div>
                                                  <div class="input-group m-t-5">
                                                    <input id="pic1" class="form-control fake-shadow" placeholder="Choose File" disabled="disabled" name="pic1">
                                                    <div class="input-group-btn">
                                                      <div class="fileUpload btn btn-danger fake-shadow">
                                                        <span><i class="glyphicon glyphicon-upload"></i>Ảnh CV</span>
                                                        <input id="logo-id-1" name="logo1" type="file" class="attachment_upload">
                                                      </div>
                                                    </div>
                                                  </div>
                                                  
                                                </div>
                                          </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                                  <div class="main-img-preview">
                                                    <img class="thumbnail img-preview-2" src="{{asset("backend/assets/images/profile.png")}}" title="Preview Logo">
                                                  </div>
                                                  <div class="input-group m-t-5">
                                                    <input id="pic2" class="form-control fake-shadow" placeholder="Choose File" disabled="disabled" name="pic2">
                                                    <div class="input-group-btn">
                                                      <div class="fileUpload btn btn-danger fake-shadow">
                                                        <span><i class="glyphicon glyphicon-upload"></i>Ảnh Chân Dung</span>
                                                        <input id="logo-id-2" name="logo2" type="file" class="attachment_upload">
                                                      </div>
                                                    </div>
                                                  </div>
                                                  
                                                </div>
                                          
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                                  <div class="main-img-preview">
                                                    <img class="thumbnail img-preview-3" src="{{asset("backend/assets/images/profile.png")}}" title="Preview Logo">
                                                  </div>
                                                  <div class="input-group m-t-5">
                                                    <input id="pic3" class="form-control fake-shadow" placeholder="Choose File" disabled="disabled" name="pic3">
                                                    <div class="input-group-btn">
                                                      <div class="fileUpload btn btn-danger fake-shadow">
                                                        <span><i class="glyphicon glyphicon-upload"></i>Ảnh Toàn Thân</span>
                                                        <input id="logo-id-3" name="logo3" type="file" class="attachment_upload">
                                                      </div>
                                                    </div>
                                                  </div>
                                                  
                                                </div>
                                      </div>
                                     </div>
                                     <div class="clearfix"></div>
                                     <!-- end img upload -->
                                     <div class="row">
                                       <div class="col-md-5">
                                        <div class="form-group row">
                                            <label for="" class="col-3 col-form-label">CMT<span class="text-danger"></span></label>
                                            <div class="col-9">
                                                <input type="text"  class="form-control"
                                                       id="people_id" name="people_id" placeholder="">
                                            </div>
                                        </div>
                                         <!-- <div class="form-group">
                                            <label for="#people_id">CMT    </label>
                                            <label for=""> <input type="text" class="form-control" id="people_id" name="people_id" placeholder="" value="{{old('people_id')}}" ></label>
                                               
                                              
                                         </div> -->
                                         <div class="form-group row">
                                            <label for="" class="col-3 col-form-label">Điện Thoại<span class="text-danger"></span></label>
                                            <div class="col-9">
                                                  <input type="text" class="form-control" id="phone" name="phone" placeholder="" value="{{old('phone')}}" />
                                                </div></label>
                                            </div>
                                        
                                        <div class="form-group row">
                                            <label for="" class="col-3 col-form-label">Thành Phố<span class="text-danger"></span></label>
                                            <div class="col-9">
                                                  <select  class="selectpicker form-control" name="city" id="city">
                                                   @foreach($cities as $city)
                                                     <option>{{$city->name}}</option>
                                                  @endforeach
                                                 </select>
                                                </div></label>
                                        </div>
                                    </div>
                                        <!--  end co-md-5 -->
                                                                                
                                   
                                     <div class="col-md-5">
                                      <div class="form-group row">
                                            <label for="" class="col-3 col-form-label">Passpost<span class="text-danger"></span></label>
                                            <div class="col-9">
                                              <input type="text" class="form-control" id="passpost" name="passpost" value="{{old('passpost')}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-3 col-form-label">E-mail<span class="text-danger">(*)</span></label>
                                            <div class="col-9">
                                               <input type="email" class="form-control" id="email" name="email" required 
                                                     parsley-type="email" placeholder="Enter a valid e-mail" value="{{old('email')}}" />
                                            </div>
                                        </div>
                                         
                                         
                                     </div>
                                     </div>
                                      <div class="row">
                                          <div class="col-md-10">
                                            <div class="form-group">
                                            <label for="" >Địa điểm chi tiết<span class="text-danger"></span></label>
                                                <textarea  class="form-control" id="address" name="address" value="{{old('address')}}"></textarea>
                                            </div>
                                          </div>
                                     </div>
                                     <div class="row">
                                         <div class="col-md-5">
                                          <div class="form-group row">
                                            <label for="" class="col-3 col-form-label">LicensedType<span class="text-danger"></span></label>
                                            <div class="col-9">
                                               <input type="text" class="form-control" id="LicensedType" name="LicensedType" value="{{old('LicensedType')}}">
                                                 <span class="text">Loại thẻ (ví dụ thẻ tiếng Trung, tiếng Anh...) </span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-3 col-form-label">Số Thẻ<span class="text-danger"></span></label>
                                            <div class="col-9">
                                               <input type="text" class="form-control" id="card_id" name="card_id" value="{{old('card_id')}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-3 col-form-label">Ngày cấp<span class="text-danger"></span></label>
                                            <div class="col-9 row">
                                                <div class="input-group ">
                                                    <input type="date" class="form-control col-md-9" placeholder="mm/dd/yyyy" id="datepicker0" name="date_start">
                                                    <div class="input-group-append col-md-3" >
                                                        <span class="input-group-text"><i class="md md-event-note"></i></span>
                                                    </div>
                                                </div><!-- input-group -->
                                                        
                                              <!-- <input type="text" class="form-control" placeholder="mm/đ/yyyy" id="date-picker" name="date_start">
                                                          <div class="input-group-append">
                                                              <span class="input-group-text"><i class="md md-event-note"></i></span>
                                                          </div> -->
                                            </div>
                                        </div>
                                        </div>

                                         <div class="col-md-5">
                                          
                                             <div class="form-group row">
                                                 <label for="class" class="col-3 col-form-label">Hạng</label>
                                                 <div class="col-9 ">
                                                 <select name="class" id="class" class="selectpicker form-control">
                                                     <option >DÍSTINGUISED GUIDE</option>
                                                     <option >GUIDE MASTER</option>
                                                     <option >LICENSED GUIDE</option>
                                                     <option >TRAVEL MATE</option>
                                                 </select>
                                                 </div>
                                             </div>
                                        <div class="form-group row">
                                            <label for="" class="col-3 col-form-label">Ngày tham gia<span class="text-danger"></span></label>
                                            <div class="col-9 row">
                                                    <input type="date" class="form-control col-md-9" placeholder="mm/dd/yyyy" id="datepicker1" class="datepicker1" name="join_date">
                                                    <div class="input-group-append col-md-3" >
                                                        <span class="input-group-text"><i class="md md-event-note"></i></span>
                                                    </div>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-3 col-form-label">Ngày hết hạn<span class="text-danger"></span></label>
                                            <div class="col-9 row">
                                              <input type="date" class="form-control col-md-9 datepicker2" placeholder="mm/dd/yyyy" id="datepicker2" name="date_end">
                                               <div class="input-group-append col-md-3" >
                                                        <span class="input-group-text"><i class="md md-event-note"></i></span>
                                              </div>          
                                            </div>
                                        </div>
                                             
                                             
                                         </div>
                                     </div>   
                                   <!--   <div class="row">
                                         <div class="col-md-10">
                                             <div class="form-group">
                                              <label>Địa điểm đã tham gia dẫn đoàn</label>
                                              <div>
                                                  <textarea required class="form-control" id="locale_1" name="locale_1"></textarea>
                                              </div>
                                         </div>
                                     </div> 
                                     </div>                              
                                     <div class="row">
                                         <div class="col-md-10">
                                             <div class="form-group">
                                              <label>Địa điểm đã đi chưa tham gia dẫn đoàn</label>
                                              <div>
                                                  <textarea required class="form-control" id="locale_2" name="locale_2"></textarea>
                                              </div>
                                           </div>
                                     </div>  
                                     </div>  -->                           
                                     <div class="row">
                                         <div class="col-md-10">
                                             <div class="form-group">
                                              <label>giới thiệu</label>
                                              <div>
                                                  <textarea  class="form-control" id="info" name="info"></textarea>
                                              </div>
                                            </div>
                                        </div>  
                                     </div>                           
                                     
                                      <div class="form-group">
                                          <div>
                                              <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                  Lưu
                                              </button>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                             </div><!-- container -->
                                  
                      </div>
                      <!-- end row -->
                    </div>
                  </div> <!-- container -->

             
       
              <footer class="footer text-right">
                  &copy; 2016 - 2018. All rights reserved.
              </footer>

        
      <!-- END wrapper -->
@endsection

@section('javascript')
      <script>
          var resizefunc = [];
      </script>
       

      <!-- jQuery  -->
      <script src="{{ asset("backend/assets/js/jquery.min.js") }}"></script>
      <script src="{{ asset("backend/assets/js/popper.min.js")}}"></script><!-- Popper for Bootstrap -->
      <script src="{{asset("backend/assets/js/bootstrap.min.js")}}"></script>
      <script src="{{asset("backend/assets/js/detect.js")}}"></script>
      <script src="{{asset("backend/assets/js/fastclick.js")}}"></script>
      <script src="{{asset("backend/assets/js/jquery.slimscroll.js")}}"></script>
      <script src="{{asset("backend/assets/js/jquery.blockUI.js")}}"></script>
      <script src="{{asset("backend/assets/js/waves.js")}}"></script>
      <script src="{{asset("backend/assets/js/wow.min.js")}}"></script>
      <script src="{{asset("backend/assets/js/jquery.nicescroll.js")}}"></script>
      <script src="{{asset("backend/assets/js/jquery.scrollTo.min.js")}}"></script>
     

      <script src="{{asset("backend/plugins/moment/moment.js")}}"></script>
      <script src="{{asset("backend/plugins/timepicker/bootstrap-timepicker.js")}}"></script>
      <script src="{{asset("backend/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js")}}"></script>
      <script src="{{asset("backend/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js")}}"></script>
      <!-- <script src="{{asset("backend/plugins/bootstrap-datepicker/js/bootstrap-datepicker1.min.js")}}"></script>
      <script src="{{asset("backend/plugins/bootstrap-datepicker/js/bootstrap-datepicker2.min.js")}}"></script> -->
      <script src="{{asset("backend/plugins/clockpicker/js/bootstrap-clockpicker.min.js")}}"></script>
      <script src="{{asset("backend/plugins/bootstrap-daterangepicker/daterangepicker.js")}}"></script>
      
  
      <script src="{{asset("backend/assets/js/jquery.core.js")}}"></script>
      <script src="{{asset("backend/assets/js/jquery.app.js")}}"></script>

      <script src="{{asset("backend/assets/pages/jquery.form-pickers.init.js")}}"></script>
      <script type="text/javascript" src="{{asset("backend/plugins/parsleyjs/parsley.min.js")}}"></script>
      
      <script type="text/javascript">
          console.log()
          $(document).ready(function() {
              $('form').parsley();
          });
      </script>
       <script type="text/javascript">
              $(document).ready(function() {
                  $('#language').multiselect();
              });
      </script>
      <script type="text/javascript">
        $(document).ready(function() {
        var brand = document.getElementById('logo-id-1');
        brand.className = 'attachment_upload';
        brand.onchange = function() {
            document.getElementById('pic1').value = this.value.substring(12);
        };

        // Source: http://stackoverflow.com/a/4459419/6396981
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                    $('.img-preview-1').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#logo-id-1").change(function() {
            readURL(this);
        });
    });
      </script>
      <script type="text/javascript">
        $(document).ready(function() {
        var brand = document.getElementById('logo-id-2');
        brand.className = 'attachment_upload';
        brand.onchange = function() {
            document.getElementById('pic2').value = this.value.substring(12);
        };

        // Source: http://stackoverflow.com/a/4459419/6396981
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                    $('.img-preview-2').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#logo-id-2").change(function() {
            readURL(this);
        });
    });
      </script><script type="text/javascript">
        $(document).ready(function() {
        var brand = document.getElementById('logo-id-3');
        brand.className = 'attachment_upload';
        brand.onchange = function() {
            document.getElementById('pic3').value = this.value.substring(12);
        };

        // Source: http://stackoverflow.com/a/4459419/6396981
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                    $('.img-preview-3').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#logo-id-3").change(function() {
            readURL(this);
        });
    });
      </script>
@endsection
