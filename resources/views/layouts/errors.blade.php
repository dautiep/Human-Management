<!-- <div class="col-md-12" style="text-align: left"> -->
@if (count($errors)>0)
    <div class="alert alert-danger" style="margin-top: 20px;">
            <strong>Lỗi!  </strong>{{$errors->first()}}
    </div>
    @endif
    @if (session('alert'))
    <div class="alert alert-danger" role="alert">
        {{session('alert')}}
    </div>
    @endif
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
    @endif


<!-- </div> -->