<!-- Start About area -->
<div id="about" class="about-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Về chúng tôi</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- single-well start-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-left">
            <div class="single-well">
              <a href="#">
								  <img src="{{URL::asset('public/images/hoasao/hoasao_about.webp')}}" alt="">
								</a>
            </div>
          </div>
        </div>
        <!-- single-well end-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-middle">
            <div class="single-well">
              <h4 class="sec-head">Giới thiệu tổng quan</h4>
              <p><?php echo $about->tong_quan ?></p>
            </div>
            <br>
            <div class="single-well">
              <h4 class="sec-head">Tầm nhìn</h4>
              <ul>
                <li>
                  <?php echo $about->tam_nhin; ?>
                </li>
              </ul>
            </div>
            <br>
            <div class="single-well">
              <h4 class="sec-head">Sứ mệnh</h4>
              <ul>
                <li>
                  <?php echo $about->su_menh; ?>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!-- End col-->
      </div>
    </div>
</div>
<!-- End About area -->