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

    @include('layouts.layout_homepage.about')

    <!-- Start Service area -->
    <div id="services" class="services-area area-padding">
        <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline services-head text-center">
                <h2>Các dự án</h2>
            </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="services-contents">
            <!-- Start Left services -->
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="about-move">
                <div class="services-details">
                    <div class="single-services">
                    <a class="services-icon" href="#">
                                                <i class="fa fa-phone"></i>
                                            </a>
                    <h4>Expert Coder</h4>
                    <p>
                        will have to make sure the prototype looks finished by inserting text or photo.make sure the prototype looks finished by.
                    </p>
                    </div>
                </div>
                <!-- end about-details -->
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="about-move">
                <div class="services-details">
                    <div class="single-services">
                    <a class="services-icon" href="#">
                                                <i class="fa fa-camera-retro"></i>
                                            </a>
                    <h4>Creative Designer</h4>
                    <p>
                        will have to make sure the prototype looks finished by inserting text or photo.make sure the prototype looks finished by.
                    </p>
                    </div>
                </div>
                <!-- end about-details -->
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <!-- end col-md-4 -->
                <div class=" about-move">
                <div class="services-details">
                    <div class="single-services">
                    <a class="services-icon" href="#">
                                                <i class="fa fa-wordpress"></i>
                                            </a>
                    <h4>Wordpress Developer</h4>
                    <p>
                        will have to make sure the prototype looks finished by inserting text or photo.make sure the prototype looks finished by.
                    </p>
                    </div>
                </div>
                <!-- end about-details -->
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <!-- end col-md-4 -->
                <div class=" about-move">
                <div class="services-details">
                    <div class="single-services">
                    <a class="services-icon" href="#">
                                                <i class="fa fa-camera-retro"></i>
                                            </a>
                    <h4>Social Marketer </h4>
                    <p>
                        will have to make sure the prototype looks finished by inserting text or photo.make sure the prototype looks finished by.
                    </p>
                    </div>
                </div>
                <!-- end about-details -->
                </div>
            </div>
            <!-- End Left services -->
            <div class="col-md-4 col-sm-4 col-xs-12">
                <!-- end col-md-4 -->
                <div class=" about-move">
                <div class="services-details">
                    <div class="single-services">
                    <a class="services-icon" href="#">
                                                <i class="fa fa-bar-chart"></i>
                                            </a>
                    <h4>Seo Expart</h4>
                    <p>
                        will have to make sure the prototype looks finished by inserting text or photo.make sure the prototype looks finished by.
                    </p>
                    </div>
                </div>
                <!-- end about-details -->
                </div>
            </div>
            <!-- End Left services -->
            <div class="col-md-4 col-sm-4 col-xs-12">
                <!-- end col-md-4 -->
                <div class=" about-move">
                <div class="services-details">
                    <div class="single-services">
                    <a class="services-icon" href="#">
                                                <i class="fa fa-ticket"></i>
                                            </a>
                    <h4>24/7 Support</h4>
                    <p>
                        will have to make sure the prototype looks finished by inserting text or photo.make sure the prototype looks finished by.
                    </p>
                    </div>
                </div>
                <!-- end about-details -->
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <!-- End Service area -->

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

    

