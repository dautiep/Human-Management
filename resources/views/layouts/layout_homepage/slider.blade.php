<!-- Start Slider Area -->
<div style="margin-top: 70px;" id="home" class="slider-area">
    <div class="bend niceties preview-2">
      <div id="ensign-nivoslider" class="slides">
        @foreach($sliders as $slider)
          <img src="{{URL::asset('public/images/slider/'.$slider->hinh_slider)}}" alt="" title="#slider-direction-{{$slider->id}}" />
        @endforeach
      </div>
      @foreach($sliders as $s)
        <!-- direction 1 -->
        <div id="slider-direction-{{$s->id}}" class="slider-direction slider-{{$s->class_slider}}">
          <div class="container">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="slider-content">
                  <!-- layer 1 -->
                  <div class="layer-1-1 hidden-xs wow slideInDown" data-wow-duration="2s" data-wow-delay=".2s">
                    <h2 class="title1">{{$s->ten_slider}}</h2>
                  </div>
                  <!-- layer 2 -->
                  <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                    <h1 class="title2">{{$s->noi_dung}}</h1>
                  </div>
                  <!-- layer 3 -->
                  <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                    <a class="ready-btn right-btn page-scroll" href="#services">CÁC DỰ ÁN</a>
                    <a class="ready-btn page-scroll" href="#about">XEM THÊM</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach

    </div>
</div>
<!-- End Slider Area -->