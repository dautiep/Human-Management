@extends('layouts.layout_homepage.home_page')
@section('head')
    @parent
    <!-- Toastr -->
    <link rel="stylesheet" href="{{URL::asset('public/lib/toastr/css/toastr.min.css')}}">

    <!-- Date Picker -->
    <link href="{{URL::asset('public/lib/datapicker/css/bootstrap-datepicker.css')}}" rel="stylesheet" type="text/css" />

    <!-- Custom css -->
    <link rel="stylesheet" href="{{URL::asset('public/css/home_page/register.style.css')}}">
    <title>BellSystem24Hoasao</title>
@endsection
@section('content')
    @include('layouts.layout_homepage.header')

    @include('layouts.layout_homepage.slider')

    <!-- Start contact Area -->
    <div id="contact" class="contact-area">
        <div class="contact-inner area-padding">
            <div class="contact-overly"></div>
            <div class="container ">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="section-headline text-center">
                        <h2>Hồ sơ ứng tuyển</h2>
                        </div>
                    </div>
                </div>
                <div class="row">

                <!-- single-well start-->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="well-left">
                        <div class="single-well">
                            <a href="#">
                                <img src="{{URL::asset('public/images/hoasao/hoasao_about.webp')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Start  contact -->
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="form contact-form">
                        <form action="{{route('apply', $job->ma_job)}}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Họ tên ứng viên</label>
                                        <input type="text" name="ho_ten" class="form-control" placeholder="Nhập họ tên của bạn" />
                                        @error('ho_ten')
                                            <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Email ứng viên</label>
                                        <input type="text" name="email" class="form-control"  placeholder="Nhập email của bạn"/>
                                        @error('email')
                                            <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Ngày sinh</label>
                                        <input type="text" data-provide="datepicker" id="ngay_sinh" name="ngay_sinh" class="form-control" placeholder="Chọn ngày sinh"/>
                                        @error('ngay_sinh')
                                            <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                    <div class="form-radio">
                                        <div class="label-flex">
                                            <label for="payment">Giới tính</label>
                                        </div>
                                        <div class="form-radio-group">            
                                            <div class="form-radio-item">
                                                <input type="radio" name="gioi_tinh" id="cash" value="1">
                                                <label for="cash">Nam</label>
                                                <span class="check"></span>
                                            </div>
                                            <div class="form-radio-item">
                                                <input type="radio" name="gioi_tinh" id="cheque" value="0">
                                                <label for="cheque">Nữ</label>
                                                <span class="check"></span>
                                            </div>
                                        </div>
                                        @error('gioi_tinh')
                                            <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                        @enderror
                                    </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Địa chỉ hiện tại</label>
                                        <input type="text" name="sonha" class="form-control" placeholder="Nhập số nhà và tên đường" />
                                        @error('sonha')
                                            <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input type="text" name="so_dien_thoai" class="form-control" placeholder="Nhập số điện thoại" />
                                        @error('so_dien_thoai')
                                            <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <label for="inputStatus">Tỉnh/Thành phố</label>
                                        <select class="form-control custom-select" name="id_tinh">
                                            <option value="" selected disabled>-Chọn tỉnh-</option>
                                            @foreach($provinces as $province)
                                                <option value="{{$province->id}}">{{$province->ten_tinh}}</option>
                                            @endforeach
                                        </select>
                                        @error('id_tinh')
                                            <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <label for="inputStatus">Huyện/Quận</label>
                                        <select class="form-control custom-select" name="id_huyen">
                                            <option value="" selected disabled>-Chọn huyện-</option>
                                        </select>
                                        @error('id_huyen')
                                            <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <label for="inputStatus">Xã/Phường</label>
                                        <select class="form-control custom-select" name="id_xa">
                                            <option value="" selected disabled>-Chọn xã-</option>
                                        </select>
                                        @error('id_xa')
                                            <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="inputStatus">Nguồn công việc</label>
                                        <select class="form-control custom-select" name="id_nguonjob">
                                            <option value="" selected disabled>-Chọn nguồn công việc-</option>
                                            @foreach($sources as $source)
                                                <option value="{{$source->id}}">{{$source->ten_nguonjob}}</option>
                                            @endforeach
                                        </select>
                                        @error('id_nguonjob')
                                            <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="inputStatus">Trình độ văn hóa</label>
                                        <select class="form-control custom-select" name="id_trinhdovanhoa">
                                            <option value="" selected disabled>-Chọn trình độ văn hóa-</option>
                                            @foreach($levels as $level)
                                                <option value="{{$level->id}}">{{$level->ten_trinhdovanhoa}}</option>
                                            @endforeach
                                        </select>
                                        @error('id_trinhdovanhoa')
                                            <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <input type="hidden" name="id_chucdanh" class="form-control" value="{{$job->id_chucdanh}}"/>
                                <input type="hidden" name="id_job" class="form-control" value="{{$job->id}}"/>
                                <input type="hidden" name="id_trangthai_phongvan" class="form-control" value="1"/>
                                <input type="hidden" name="id_ketqua_phongvan" class="form-control" value="4"/>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="text-left" ><button style="margin-top: 42px;" type="submit">Ứng tuyển ngay</button></div>
                                </div>
                            </div>
                        </form>
                    </div>  
                </div>
                <!-- End Left contact -->
                </div>
            </div>
        </div>
    </div>
    
    <!-- End Contact Area -->
    @section('script')
    @parent
    <!-- toastr -->
    <script src="{{URL::asset('public/lib/toastr/js/toastr.min.js')}}"></script>

    <!-- Date Picker -->
    <script src="{{URL::asset('public/lib/datapicker/js/bootstrap-datepicker.js')}}" type="text/javascript"></script>

    <!-- hide errors -->
    <script type="text/javascript">
        window.setTimeout(function() {

            $(".alert-err").fadeTo(500, 0).slideUp(500, function(){

                $(this).remove(); 
            });
        }, 10000);
    </script>

    <!-- Toastr config -->
    <script>
        toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "timeOut": "3000",
        "extendedTimeOut": "3000"
        }

        @if(Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch(type){
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;

                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;

                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>

    <!-- datapicker config -->
    <script type="text/javascript">
        $('#ngay_sinh').datepicker({
            format:"dd-mm-yyyy",
            todayBtn:"linked",
            todayHighlight: true,
            orientation:"bottom right",
            autoclose: true,
        });

    </script>

    <!-- show district and communes in province -->
    <script>
        var url = "{{route('show-district')}}";
        $("select[name='id_tinh']").change(function(){
            var id_tinh = $(this).val();
            var token = $("input[name='_token']").val();
            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    id_tinh: id_tinh,
                    _token: token
                },
                success: function(data) {
                    $("select[name='id_huyen'").html('');
                    $.each(data, function(key, value){
                        $("select[name='id_huyen']").append(
                            "<option value=" + value.id + ">" + value.ten_huyen + "</option>"
                        );
                    });
                }
            });
        });

        var url1 = "{{route('show-commune')}}";
        $("select[name='id_huyen']").change(function(){
            var id_huyen = $(this).val();
            var token = $("input[name='_token']").val();
            $.ajax({
                url: url1,
                method: 'POST',
                data: {
                    id_huyen: id_huyen,
                    _token: token
                },
                success: function(data) {
                    $("select[name='id_xa'").html('');
                    $.each(data, function(key, value){
                        $("select[name='id_xa']").append(
                            "<option value=" + value.id + ">" + value.ten_xa + "</option>"
                        );
                    });
                }
            });
        });

    </script>
    @endsection
@endsection

    

