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
    @include('layouts.layout_homepage.header_detail_job')

    @include('layouts.layout_homepage.slider')

    <!-- Start About area -->
    <div id="detail" class="services-area area-padding">
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
                    <button class="apply-btn" style="margin-left: 42px;" data-majob="{{$detail_job->id_job}}" data-toggle="modal" data-target="#UploadCVModal">
                        Tải hồ sơ
                    </button>
                    
                </div>
            </div>
            <!-- End col-->
        </div>
        </div>
    </div>
    <!-- End About area -->

    <!-- Modal upload -->
	<div class="modal modal-danger fade" id="UploadCVModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
			<h4 class="modal-title text-left" id="myModalLabel">Tải hồ sơ</h4>
			</div>
            <form method="POST" id="upload_form" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="modal-body">
                        <p class="text-center">
                            Tải hồ sơ lên từ trên máy bạn
                        </p>
                        
                            <div class="form-group col-md-6">
                                <label>Họ tên của bạn</label>
                                <input type="text" name="ho_ten" placeholder="Nhập họ tên của bạn">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Email của bạn</label>
                                <input type="text" name="email" placeholder="Nhập email của bạn">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Số điện thoại</label>
                                <input type="text" name="so_dien_thoai" placeholder="Nhập số điện thoại của bạn">
                            </div>
                            
                            
                        <input type="file" id="select_file" name="select_file" value="">
                        <input type= "hidden" id="majob" name="id_job" value="">
        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Hủy</button>
                        <button type="submit" id="upload" name="upload" class="btn btn-primary">Tải lên</button>
                    </div>
                </div>
            </form>
		</div>
		</div>
	</div>
    <!-- End Modal upload-->
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

    <!-- errors -->
    <script>
        $('#UploadCVModal').on('show.bs.modal', function(event){
			var button = $(event.relatedTarget)
			var job_ma = button.data('majob')
			var modal = $(this);
			modal.find('.modal-body #majob').val(job_ma);
		});

        $('#upload_form').on('submit', function(event)
        {
            event.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.ajax({
                url: "{{route('uploadcv', $detail_job->id_job)}}",
                method: 'post',
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success:function(data)
                {
                    if(data.message)
                    {
                        toastr.success(data.message);
                    }
                    else
                    {
                        toastr.error(data.error);
                    }
                    $('#UploadCVModal').modal('hide');
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    
                    alert(thrownError);
                }
            })
        })
    </script>


    @endsection
@endsection

    

