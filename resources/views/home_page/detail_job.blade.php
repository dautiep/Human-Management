@extends('layouts.layout_homepage.home_page')
@section('head')
    @parent
    <!-- Toastr -->
    <link rel="stylesheet" href="{{URL::asset('public/lib/toastr/css/toastr.min.css')}}">
    <!-- Custom css -->
    <link rel="stylesheet" href="{{URL::asset('public/css/home_page/register.style.css')}}">
    <title>BellSystem24Hoasao</title>
@endsection
@section('content')
    @include('layouts.layout_homepage.header')

    @include('layouts.layout_homepage.slider')

    <!-- Start About area -->
    <div id="about" class="about-area area-padding">
        <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-left">
                    <h2>[{{$detail_job->job->ma_job}}] {{$detail_job->job->ten_job}}</h2>
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
            <!-- single-well end-->
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="well-middle">
                    <div class="single-well">
                        <h4 class="sec-head">Giới thiệu tổng quan</h4>
                        <p><?php echo $detail_job->job->mo_ta_job ?></p>
                    </div>
                    <br>
                    <div class="single-well">
                        <h4 class="sec-head">Mô tả công việc</h4>
                        <ul>
                            <?php echo $detail_job->mo_ta_cong_viec ?>
                        </ul>
                    </div>
                    <br>
                    <div class="single-well">
                        <h4 class="sec-head">Quyền lợi</h4>
                        <ul>
                            <?php echo $detail_job->quyen_loi  ?>
                        </ul>
                    </div>
                    <br>
                    <div class="single-well">
                        <h4 class="sec-head">Yêu cầu công việc</h4>
                        <ul>
                            <?php echo $detail_job->yeu_cau_cong_viec  ?>
                        </ul>
                    </div>
                    <br>
                    <div class="single-well">
                        <h4 class="sec-head">Thời gian làm việc</h4>
                        <ul>
                            <?php echo $detail_job->thoi_gian_lam_viec  ?>
                        </ul>
                    </div>
                    <br>
                    <a href="{{route('apply-job', $job->ma_job)}}" class="apply-btn">Ứng tuyển công việc này</a>
                    
                </div>
            </div>
            <!-- End col-->
        </div>
        </div>
    </div>
    <!-- End About area -->
    @section('script')
    @parent
    <!-- toastr -->
    <script src="{{URL::asset('public/lib/toastr/js/toastr.min.js')}}"></script>

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
    @endsection
@endsection

    

