@extends('layouts.layout_admin.admin')
@section('head')
    @parent
    <!-- NProgress -->
    <link href="{{URL::asset('public/css/project/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{URL::asset('public/css/project/green.css')}}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{URL::asset('public/css/project/custom.min.css')}}" rel="stylesheet">
    <!--Custom css-->
    <link rel="stylesheet" href="{{URL::asset('public/css/custom.css')}}">
@endsection
@section('content')
    <body class="nav-md">
        <div class="content-wrapper">
            <div class="container body">
                <div class="main_container">
                    <!-- page content -->
                    <div class="right_col" role="main">
                        <div class="page-title">
                            <div class="title_left">
                                <h3>Chi tiết dự án</h3>
                            </div>
                        </div>
                        
                        <div class="clearfix"></div>
    
                        <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                            <div class="x_title">
                                <h2>Tiến trình dự án</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"></a>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
    
                            <div class="x_content">
    
                                <div class="col-md-9 col-sm-9  ">
    
                                <ul class="stats-overview">
                                    <li>
                                    <span class="name">Số lượng cần tuyển</span>
                                    <span class="value text-success">{{$project->quymo_tbinh}}</span>
                                    </li>
                                    <li>
                                    <span class="name">Số lượng đã tuyển</span>
                                    <span class="value text-success"> 2000 </span>
                                    </li>
                                    <li class="hidden-phone">
                                    <span class="name">Còn lại</span>
                                    <span class="value text-success"> 20 </span>
                                    </li>
                                </ul>
                                <br />
    
                                <div id="mainb" style="height:350px;"></div>
                                </div>
    
                                <!-- start project-detail sidebar -->
                                <div class="col-md-3 col-sm-3  ">
    
                                <section class="panel">
    
                                    <div class="x_title">
                                        <h2>Thông tin dự án</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="panel-body">
                                        <h3 class="green"><i class="fa fa-paint-brush" style="margin-right: 10px;"></i>{{$project->ten_du_an}}</h3>
                                        <p class="title"><b>Giới thiệu:</b></p>
                                        <?php echo $project->mota_duan ?>
                                        <br />
    
                                        <div class="project_detail">
        
                                            <p class="title">Thời gian dự kiến</p>
                                            <p>2 năm</p>
                                            <p class="title">Thời gian bắt đầu</p>
                                            <p>{{date_format(date_create("$project->thoigian_batdau"),"d-m-Y")}}</p>
                                            <p class="title">Thời gian kết thúc</p>
                                            <p>{{date_format(date_create("$project->thoigian_ketthuc"),"d-m-Y")}}</p>
                                        </div>
    
                                        <br />
                                        <h5>Tác giả project</h5>
                                        <ul class="list-unstyled project_files">
                                            <li><i class="fa fa-file-word-o"></i>Họ tên:  {{$project->user->hoten}}</li>
                                            <li><i class="fa fa-file-pdf-o"></i>Danh số:  {{$project->user->danhso}}</li>
                                            <li><i class="fa fa-mail-forward"></i>Email:  {{$project->user->email}}</li>
                                        </ul>
                                        <br />

                                        <div class="text-center mtop20">
                                            <a href="{{route('projects.index')}}" class="btn btn-sm btn-primary">Trở về</a>
                                            <a href="{{route('projects.edit', $project->slug)}}" class="btn btn-sm btn-warning">Chỉnh sửa thông tin</a>
                                        </div>
    
                                    </div>
    
                                </section>
    
                                </div>
                                <!-- end project-detail sidebar -->
    
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- /page content -->
                </div>
            </div>
        </div>
    </body>
@endsection
@section('script')
    @parent
    <!-- NProgress -->
    <script src="{{URL::asset('public/js/project/nprogress.js')}}"></script>
    <!-- ECharts -->
    <script src="{{URL::asset('public/js/project/echarts.min.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{URL::asset('public/js/project/custom.min.js')}}"></script>
@endsection