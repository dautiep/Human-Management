<!-- <div class="col-md-12" style="text-align: left"> -->
@if (count($errors)>0)
    <div class="alert alert-danger" style="margin-top: 20px;">
        @foreach ($errors->all() as $error)
        {{$error}}<br>
        @endforeach
    </div>
    @endif
    @if (session('alert'))
    <div class="alert alert-danger">
        {{session('alert')}}
    </div>
    @endif
    @if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif


<!-- </div> -->