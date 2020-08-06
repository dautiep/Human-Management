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

    <!-- Start Blog Area -->
    <div id="blog" class="blog-area">
        <div class="blog-inner area-padding">
            <div class="blog-overly"></div>
            <div class="container ">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="section-headline text-center">
                        <h2>Danh sách công việc</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($jobs as $job)
                    <!-- Start Left Blog -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="single-blog">
                            <div class="single-blog-img">
                                <a href="blog.html">
                                    <img src="{{URL::asset('public/images/hoasao/'.$job->hinh)}}" alt="">
                                </a>
                            </div>
                            <div class="blog-meta">
                                <span class="date-type">
                                    <i class="fa fa-calendar"></i>Ngày tạo: {{$job->created_at}}
                                </span>
                            </div>
                            <div class="blog-text">
                                <h4>
                                    <a href="blog.html">{{$job->ten_job}}</a>
                                </h4>
                                <p>{{$job->mo_ta_job}}</p>
                            </div>
                            <span>
                                <a href="{{route('detail-job', $job->ma_job)}}" class="ready-btn">Chi tiết</a>
                            </span>
                        </div>
                        <!-- Start single blog -->
                    </div>
                    <!-- End Left Blog-->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->

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

    

