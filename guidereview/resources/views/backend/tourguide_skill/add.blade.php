@extends('backend.layout')
@section('title', 'Thêm TourGuide')
@section('css')


  <link href="{{asset("backend/assets/css/bootstrap.min.css")}}" rel="stylesheet" type="text/css" />
  <link href="{{asset("backend/assets/css/components-md.min.css")}}" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="{{asset("backend/assets/css/bootstrap-example.min.css")}}" type="text/css">
  <link rel="stylesheet" href="{{asset("backend/assets/css/prettify.min.css")}}" type="text/css">
  <link rel="stylesheet" href="{{asset("backend/assets/css/photo.css")}}" type="text/css">
  <link rel="stylesheet" href="{{asset("backend/assets/css/custom.css")}}" type="text/css">
  <link rel="stylesheet" href="{{asset("backend/assets/css/profile.min.css")}}" type="text/css">
  <link rel="stylesheet" href="{{asset("backend/assets/css/ticket.min.css")}}" type="text/css">

      <link href="{{asset("backend/plugins/timepicker/bootstrap-timepicker.min.css")}}" rel="stylesheet">
      <link href="{{asset("backend/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css")}}" rel="stylesheet">
      <link href="{{asset("backend/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css")}}" rel="stylesheet">
      <!-- <link href="{{asset("backend/plugins/bootstrap-datepicker/css/bootstrap-datepicker1.min.css")}}" rel="stylesheet">
      <link href="{{asset("backend/plugins/bootstrap-datepicker/css/bootstrap-datepicker2.min.css")}}" rel="stylesheet"> -->
      <link href="{{asset("backend/plugins/clockpicker/css/bootstrap-clockpicker.min.css")}}" rel="stylesheet">
      <link href="{{asset("backend/plugins/bootstrap-daterangepicker/daterangepicker.css")}}" rel="stylesheet">


  <link href="{{asset("backend/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css")}}" rel="stylesheet" />
  <link href="{{asset("backend/plugins/switchery/css/switchery.min.css")}}" rel="stylesheet" />
  <link href="{{asset("backend/plugins/multiselect/css/multi-select.css")}}"  rel="stylesheet" type="text/css" />
  <link href="{{asset("backend/plugins/select2/css/select2.min.css")}}" rel="stylesheet" type="text/css" />
  <link href="{{asset("backend/plugins/bootstrap-select/css/bootstrap-select.min.css")}}" rel="stylesheet" />
  <link href="{{asset("backend/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css")}}" rel="stylesheet" />
   <link href="{{asset("backend/plugins/summernote/summernote-bs4.css")}}" rel="stylesheet" />

  <link href="{{asset("backend/assets/css/icons.css")}}" rel="stylesheet" type="text/css" />
  <link href="{{asset("backend/assets/css/style.css")}}" rel="stylesheet" type="text/css" />
  <!-- <link href="{{asset("backend/assets/cssicheck/custom.css?v=1.0.2")}}" rel="stylesheet">
  <link href="{{asset("backend/assets/skins/all.css?v=1.0.2")}}" rel="stylesheet">
  <script src="{{asset("backend/assets/jsicheck/jquery.js")}}"></script>
  <script src="{{asset("backend/assets/icheck.js?v=1.0.2")}}"></script>
  <script src="{{asset("backend/assets/jsicheck/custom.min.js?v=1.0.2")}}"></script> -->


  <script type="text/javascript" src="{{asset("backend/assets/js/jquery.min.js")}}"></script>
  <script type="text/javascript" src="{{asset("backend/assets/js/photo.js")}}"></script>
  <script type="text/javascript" src="{{asset("backend/assets/js/prettify.min.js")}}"></script>
  <link href="{{asset("backend/assets/css/bootstrap-multiselect.css")}}" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="{{asset("backend/assets/js/bootstrap-multiselect.js")}}"></script>
  <script  src="{{asset("backend/assets/js/modernizr.min.js")}}"></script>
  @endsection

  @section('content')
  <div style="display: none;">  {{$img_cv = $tourguides->img_cv }}</div>
  <div style="display: none;">  {{$ids = $tourguides->id }}</div>
  <div class="container-fluid">
    <ul class="page-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><a href="{{action('Backend\BackendController@dashboard')}}"><i class="fa fa-home"></i>Bảng Tin</a></li>
      <li class="breadcrumb-item"><a href="{{action('Backend\TourGuideController@index')}}">TourGuide</a></li>
      <li class="breadcrumb-item active">Thêm kĩ năng</li>
    </ul>
    <div class="row">
    <div class="col-md-12">
     <div class="profile-sidebar">
        <!-- PORTLET MAIN -->
                <div class="portlet light profile-sidebar-portlet bordered">
                <div class="profile-userpic">
                  <img  src="{{asset("images/$img_cv")}}" class="rounded-circle" alt="{{$tourguides->name}}">
                </div>
                <div class="profile-usertitle">
                  <div class="profile-usertitle-name">{{$tourguides->name}}</div>
                  <div class="profile-usertitle-job">{{$tourguides->class}}</div>
                </div>
                
                <div class="profile-userbuttons">
                  <a href="{{action('Backend\TourGuideController@edit',['id'=>$ids])}}" class="btn btn-circle green btn-sm">Nâng cấp</a>
                 <!--  <button type="button" class="btn btn-danger btn-rounded waves-effect waves-light"><a href="">Nâng cấp</a></button> -->
                  <button type="button" id="btnUnblock" class="btn btn-circle red btn-sm" style="display: inline-block;">khóa</button>
                </div>
               
                <div class="profile-usermenu">
                  <ul class="">
                    <li><a href="{{action('Backend\TourGuideController@showprofile',['id'=>$ids])}}"><i class="fa fa-home" "></i>Thông Tin Cá Nhân</a></li>
                    <li><a href="{{ action('Backend\TourGuideController@show_skill',['id' => $ids]) }}"><i class="fa fa-cog "></i>Kĩ Năng Nghề Nghiệp</a></li>
                    <li><a href="{{action('Backend\CommentController@showComment',['id'=>$ids])}}"><i class="fa fa-comments "></i>Comment</a></li>
                  </ul>
                </div>
            </div>
      <!--END-->
            <div class="portlet light bordered">
      <!-- STAT -->
                <div class="row list-separated profile-stat">
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="uppercase profile-stat-title"> {{count($comments)}} </div>
                        <div class="uppercase profile-stat-text"> Comments </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="uppercase profile-stat-title"> 51 </div>
                        <div class="uppercase profile-stat-text"> Views </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="uppercase profile-stat-title"> 61 </div>
                        <div class="uppercase profile-stat-text"> Votes </div>
                    </div>
                </div>
                <!-- END STAT -->
             
            </div>
          </div>

          <div class="app-ticket app-ticket-details">
             <!-- 
              <div class="portlet">
                <div class="portlet-body">
                 <div class="row"> -->
                  <div class="col-md-12">
                    <input type="hidden" name="" value="{{$id =$tourguides->id}}">
                    <form method="post" class="form-add" action="{{ action('Backend\TourGuideController@show_skill',['id' => $id]) }}" enctype="multipart/form-data">
                     {{ csrf_field() }}
                     <div class=" card-box">
                       <div class="col-md-12">@include('backend.shared.flash-message')</div>
                     <div class="form-group ">
                      <label for="" class="text-uppercase" style="color: dodgerblue">Ngôn Ngữ</label>
                      <hr>
                      <div class="row">
                        <div class="col-md-6">
                          @foreach($tourguide_lang1 as $lang1)
                          <div class="checkbox checkbox-primary">
                            <input id="{{$lang1->id}}" class="lang" type="checkbox" name="languages[]" value="{{$lang1->id}}"  >
                            <label for="{{$lang1->id}}">
                             {{$lang1->language}} 
                           </label>
                         </div>
                         @endforeach 
                       </div>
                       <div class="col-md-6">
                        @foreach($tourguide_lang2 as $lang2)
                        <div class="checkbox checkbox-primary">
                          <input id="{{$lang2->id}}" class="lang" type="checkbox" name="languages[]" value="{{$lang2->id}}"  >
                          <label for="{{$lang2->id}}">
                           {{$lang2->language}} 
                         </label>
                       </div>
                       @endforeach                           
                     </div>
                   </div>

                 </div>
                 <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Khác</label>
                      <div>
                        <textarea  class="form-control" id="lang" name="lang" value=>{{$tourguides->language }}</textarea>
                      </div>
                    </div>
                  </div> 

                  <div class="form-group">
                   <div>
                     <button type="submit" class="btn btn-primary waves-effect waves-light" name="btn_language">
                      Lưu
                    </button>
                    
                  </div>
                </div>    
                </div>  
                </div>

                <!--role-->   
                  <div class=" card-box">
                     <div class="form-group">
                      <label for="" class="text-uppercase" style="color: dodgerblue">Những vai trò có thể đảm nhiệm khi dẫn đoàn</label> 
                      <hr>
                      <div class="row">
                      <div class="col-md-6">
                      @foreach($tourguide_role1 as $role1)
                             <div class="checkbox checkbox-primary">
                              <input id="{{$role1->id +20}}" class="role" type="checkbox" name="roles[]" value="{{$role1->id}}"  >
                                <label for="{{$role1->id +20}}">
                                   {{$role1->name}} 
                                </label>
                             </div>
                      @endforeach 
                        </div>
                        <div class="col-md-6">
                      @foreach($tourguide_role2 as $role2)
                             <div class="checkbox checkbox-primary">
                              <input id="{{$role2->id +20}}" class="role" type="checkbox" name="roles[]" value="{{$role2->id}}"  >
                                <label for="{{$role2->id +20}}">
                                   {{$role2->name}} 
                                </label>
                             </div>
                      @endforeach                           
                        </div>
                      </div>

                      </div>
                      <div class="row">
                     
                      
                      <div class="form-group">
                           <div>
                                 <button type="submit" class="btn btn-primary waves-effect waves-light" name="btn_role">
                                        Lưu
                                 </button>
                           </div>
                      </div>  
                      </div> 
                      </div>
                      <!--field-->
                      <div class=" card-box">
                     <div class="form-group">
                    <label for="" class="text-uppercase" style="color: dodgerblue">Những vai trò có thể đảm nhiệm khi dẫn đoàn</label>
                    <hr>
                <div class="portlet-body">
                    <div class="row">
                        <div class="form-body col-md-12">
                            <div class="form-group">
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-left">
                                                </th>
                                                <th class="text-center">
                                                    Khách lẻ
                                                </th>
                                                <th class="text-center" >
                                                    Đoàn 4-10
                                                </th>
                                                <th class="text-center">
                                                    Đoàn 10-25
                                                </th>
                                                <th class="text-center">
                                                    Đoàn 25-40
                                                </th>
                                                <th class="text-center">
                                                    Đoàn trên 40
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <tr class="text-left">
                                            <td class="text-left"> Đưa đón khách </td>
                                             @foreach($tourguide_field1 as $field1)
                                              <td class="text-center">
                                              <div class="" style="position: relative;">
                                                  <input id="{{$field1->id +50}}" class="field" type="checkbox" name="field[]" value="{{$field1->id}}"  >
                                              </div>
                                              </td>
                                              @endforeach
                                          </tr>                                          
                                          <tr class="text-left">
                                            <td class="text-left">  Tour tâm linh  </td>
                                             @foreach($tourguide_field2 as $field2)
                                              <td class="text-center">
                                              <div class="" style="position: relative;">
                                                  <input id="{{$field2->id +50}}" class="field" type="checkbox" name="field[]" value="{{$field2->id}}"  >
                                              </div>
                                              </td>
                                              @endforeach
                                          </tr>                                          
                                          <tr class="text-left">
                                            <td class="text-left">  Tour teambuilding  </td>
                                             @foreach($tourguide_field3 as $field3)
                                              <td class="text-center">
                                              <div class="" style="position: relative;">
                                                  <input id="{{$field3->id+50}}" class="field" type="checkbox" name="field[]" value="{{$field3->id}}"  >
                                              </div>
                                              </td>
                                              @endforeach
                                          </tr>                                          
                                          <tr class="text-left">
                                            <td class="text-left">  Tour mạo hiểm  </td>
                                             @foreach($tourguide_field4 as $field4)
                                              <td class="text-center">
                                              <div class="" style="position: relative;">
                                                  <input id="{{$field4->id+50}}" class="field" type="checkbox" name="field[]" value="{{$field4->id}}"  >
                                              </div>
                                              </td>
                                              @endforeach
                                          </tr>                                          
                                          <tr class="text-left">
                                            <td class="text-left">  Tour học sinh  </td>
                                             @foreach($tourguide_field5 as $field5)
                                              <td class="text-center">
                                              <div class="" style="position: relative;">
                                                  <input id="{{$field5->id+50}}" class="field" type="checkbox" name="field[]" value="{{$field5->id}}"  >
                                              </div>
                                              </td>
                                              @endforeach
                                          </tr>                                          
                                          <tr class="text-left">
                                            <td class="text-left">  Tour truyền thống  </td>
                                             @foreach($tourguide_field6 as $field6)
                                              <td class="text-center">
                                              <div class="" style="position: relative;">
                                                  <input id="{{$field6->id+50}}" class="field" type="checkbox" name="field[]" value="{{$field6->id}}"  >
                                              </div>
                                              </td>
                                              @endforeach
                                          </tr>                                          
                                          <tr class="text-left">
                                            <td class="text-left">  Tour nghỉ dưỡng  </td>
                                             @foreach($tourguide_field7 as $field7)
                                              <td class="text-center">
                                              <div class="" style="position: relative;">
                                                  <input id="{{$field7->id+50}}" class="field" type="checkbox" name="field[]" value="{{$field7->id}}"  >
                                              </div>
                                              </td>
                                              @endforeach
                                          </tr>                                          
                                          <tr class="text-left">
                                            <td class="text-left">  Tour xe đạp  </td>
                                             @foreach($tourguide_field8 as $field8)
                                              <td class="text-center">
                                              <div class="" style="position: relative;">
                                                  <input id="{{$field8->id+50}}" class="field" type="checkbox" name="field[]" value="{{$field8->id}}"  >
                                              </div>
                                              </td>
                                              @endforeach
                                          </tr>                                          
                                          <tr class="text-left">
                                            <td class="text-left">  Tour xe máy  </td>
                                             @foreach($tourguide_field9 as $field9)
                                              <td class="text-center">
                                              <div class="" style="position: relative;">
                                                  <input id="{{$field9->id+50}}" class="field" type="checkbox" name="field[]" value="{{$field9->id}}"  >
                                              </div>
                                              </td>
                                              @endforeach
                                          </tr>                                          
                                          <tr class="text-left">
                                            <td class="text-left"> Foody tour  </td>
                                             @foreach($tourguide_field10 as $field10)
                                              <td class="text-center">
                                              <div class="" style="position: relative;">
                                                  <input id="{{$field10->id+50}}" class="field" type="checkbox" name="field[]" value="{{$field10->id}}"  >
                                              </div>
                                              </td>
                                              @endforeach
                                          </tr>
                                        </tbody>
                                    </table>
                                    <input class="talent-ids" name="talent-id" type="hidden">
                                </div>
                            </div>
                        </div>
                    </div>
                      <div class="form-group">
                           <div>
                                 <button type="submit" class="btn btn-primary waves-effect waves-light" name="btn_role">
                                        Lưu
                                 </button>
                                 
                           </div>
                      </div>  
                </div>
            </div>
             </div>
             <!-- end -->
                      <!--certificate-->  
                     <div class=" card-box">
                     <div class="form-group js-lang-check" id="js-lang-check">
                      <label for="" class="text-uppercase" style="color: dodgerblue">
                        
                        Chứng chỉ đạt được

                      </label>
                      <hr>
                      <div class="row">
                      <div class="col-md-6">
                      @foreach($tourguide_certificate1 as $certificate1)
                             <div class="checkbox checkbox-primary">
                              <input id="{{$certificate1->id +30}}" class="certificate" type="checkbox" name="certificates[]" value="{{$certificate1->id}}"  >
                                <label for="{{$certificate1->id +30}}">
                                   {{$certificate1->name}} 
                                </label>
                             </div>
                      @endforeach 
                        </div>
                        <div class="col-md-6">
                      @foreach($tourguide_certificate2 as $certificate2)
                             <div class="checkbox checkbox-primary">
                              <input id="{{$certificate2->id +30}}" class="certificate" type="checkbox" name="certificates[]" value="{{$certificate2->id}}"  >
                                <label for="{{$certificate2->id +30}}">
                                   {{$certificate2->name}} 
                                </label>
                             </div>
                      @endforeach                           
                        </div>
                      </div>
                      </div>
                      

                      <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                            <label >Khác</label>
                            <div>
                            <textarea  class="form-control" id="certi" name="certi" value=>{{$tourguides->certificate }}</textarea>
                            </div>
                          </div>
                      </div>
                        <div class="form-group">
                           <div>
                                 <button type="submit" class="btn btn-primary waves-effect waves-light" name="btn_role">
                                        Lưu
                                 </button>
                           </div>
                      </div>  
                    </div>
                  </div>

                  <div class="card-box">
                    <div class="row">
                      <div class="col-md-12">
                              <div class="form-group">
                                  <label for="start" class="text-uppercase" style="color: dodgerblue" >Thời gian bận</label>
                                  <div>
                                    <div class="input-daterange input-group" id="date-range">
                                        <input type="text" class="form-control" name="start" id="start" value="{{$tourguides->start}}" />
                                        <input type="text" class="form-control" name="end"  id="end" value="{{$tourguides->end}}" />
                                    </div>
                                  </div>
                              </div>  
                               <div class="form-group">
                           <div>
                                 <button type="submit" class="btn btn-primary waves-effect waves-light" name="btn_role">
                                        Lưu
                                 </button>
                           </div>
                      </div>                       
                      </div>
                    </div>
                  </div>

                  <div class="card-box">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="" class="text-uppercase" style="color: dodgerblue" > Địa điểm đã tham gia dẫn đoàn </label>
                            <hr style="padding:10px 0 2px 0;">
                             <textarea name="locale_1" id="content" >{{$tourguides->locale_1}}</textarea>
                          </div>
                            <div class="form-group">
                               <div>
                                     <button type="submit" class="btn btn-primary waves-effect waves-light" name="btn_role">
                                            Lưu
                                     </button>
                                    
                               </div>
                            </div>  
                        </div> 
                     </div>
                  </div>

                  <div class="card-box">
                     <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="" class="text-uppercase"style="color: dodgerblue"> Địa điểm đã tham quan, chưa dẫn đoàn</label>
                            <hr>
                           <textarea name="locale_2" id="content2" >{{$tourguides->locale_2}}</textarea>
                          </div>
                        </div> 
                     </div>

                      <div class="form-group">
                           <div>
                                 <button type="submit" class="btn btn-primary waves-effect waves-light" name="btn_certificate">
                                        Lưu
                                 </button>
                                 
                           </div>
                      </div> 
                      </div>

                      </div>
                      </div>             
              </form>
            <!-- </div>
          </div>
        </div> -->
      </div>
    </div>

  


</div>

</div>

</div> 
</div> <!--container -->


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



    <script src="{{asset("backend/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js")}}"></script>
    <script src="{{asset("backend/plugins/switchery/js/switchery.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("backend/plugins/multiselect/js/jquery.multi-select.js")}}"></script>
    <script type="text/javascript" src="{{asset("backend/plugins/jquery-quicksearch/jquery.quicksearch.js")}}"></script>
    <script src="{{asset("backend/plugins/select2/js/select2.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("backend/plugins/bootstrap-select/js/bootstrap-select.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("backend/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("backend/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("backend/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js")}}" type="text/javascript"></script>

    <script src="{{asset("backend/assets/js/jquery.core.js")}}"></script>
    <script src="{{asset("backend/assets/js/jquery.app.js")}}"></script>

    <script src="{{asset("backend/assets/pages/jquery.form-pickers.init.js")}}"></script>
    <script type="text/javascript" src="{{asset("backend/plugins/parsleyjs/parsley.min.js")}}"></script>
  <!--   <script src="{{asset("backend/plugins/summernote/summernote-bs4.min.js")}}"></script> -->
    <script src="{{ asset("backend/plugins/tinymce/tinymce.min.js") }}"></script>
    @include('backend.shared.initjs')
    <script>
      $(document).ready(function(){
           $("#content").richer('#content');
           $("#content2").richer('#content2');
            $('#title').slugify({target: '#slug'});



        var tourguide_lang = "{{$tourguide_lang}}";
        var array = JSON.parse("[" + tourguide_lang + "]");
        $( ".lang" ).each(function( index, element ) {
         var a = $(element).attr('id');
         var b=a-1;
         var c=b+1; ///??????????
         var arr = array.indexOf(c);
         //console.log(arr);
         var $input = $( this );
         if( arr >=0 )
           $input.prop("checked",true);
         else  
          $input.prop("checked",false);
      });

        var tourguide_role = "{{$tourguide_role}}";
        //console.log(tourguide_role);
        var array_role = JSON.parse("[" + tourguide_role + "]");
        $( ".role" ).each(function( index, element ) {
         var a = $(element).attr('id');

         var b=a-21;
         var c=b+1; ///??????????
         var array_roles = array_role.indexOf(c);
         //console.log(b);
         var $input = $( this );
         if( array_roles >=0 )
           $input.prop("checked",true);
         else  
           $input.prop("checked",false);
         
       });

        var tourguide_certificate = "{{$tourguide_certificate}}";
        var array_certificate = JSON.parse("[" + tourguide_certificate + "]");
        $( ".certificate" ).each(function( index, element ) {
         var a = $(element).attr('id');
         console.log(a);
         var b=a-31;
         var c=b+1; ///??????????
         var array_certificates = array_certificate.indexOf(c);
        //console.log(array_certificates);
         var $input = $( this );
         if( array_certificates >=0 )
           $input.prop("checked",true);
         else  
           $input.prop("checked",false);
         
       });
        var tourguide_field = "{{$tourguide_field}}";
        var array_field = JSON.parse("[" + tourguide_field + "]");
        $( ".field" ).each(function( index, element ) {
         var a = $(element).attr('id');
         //console.log(a);
         var b=a-51;
         var c=b+1; ///??????????
         console.log(c);
         var array_fields = array_field.indexOf(c);
         console.log(array_field);
         var $input = $( this );
         if( array_fields >=0 )
           $input.prop("checked",true);
         else  
           $input.prop("checked",false);
         
       });

      });

    </script>

    @endsection
