


  <marquee behavior="scroll" direction="left" vspace ="20" scrollamount = "10" class = "font-weight-bold" style = "font-size: 1.2rem;"><?=$notices;?></marquee>


 <section style="overflow: hidden;">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <?php $j=1;?>
      <?php foreach($sliders as $slider):?>
      <li data-target="#carouselExampleIndicators" data-slide-to="<?=$j;?>" class="<?php if($j==1) echo 'active'; ?>"></li>
      <?php $j++; ?>
      <?php endforeach; ?>
    </ol>
    <div class="carousel-inner">
      <?php $i=1; ?>
      <?php foreach($sliders as $slider): ?>
      <div class="carousel-item <?php if($i==1) echo 'active'; ?>">
        <img class="d-block w-100" src="<?php echo site_url(); ?>assets/images/sliders/<?php echo$slider['img'];?>" alt="Slider Image" class="img-fluid" style="width: 100% !important;">
        <div class="carousel-caption d-none d-md-block">
          <h5 class="font-weight-bold" style="font-size: 2rem;"><?=$slider['title']?></h5>
          <p class="font-weight-bold" style="font-size: 1.2rem;"><?=$slider['note']?></p>
        </div>
      </div>
      <?php $i++; ?>
      <?php endforeach; ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</section>


<div class="container">
  <section class="" style="margin-top: 5rem;">
    <div class="row text-center">
      <div class="col-md-4">
        <!-- <i class="fas fa-fist-raised fa-5x" style="color: #006A4E"></i> -->
        <img src="<?php echo base_url()?>assets/images/logo/army.png" class="img-fluid" style="height: 160px; width: 160px;">
        <h5 class="mt-2 font-weight-bold">Bangladesh Army</h5>
        <p class=" text-justify mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
      <div class="col-md-4">
        <!-- <i class="fas fa-ship fa-5x" style="color: blue"></i> -->
        <img src="<?php echo base_url()?>assets/images/logo/navy.png" class="img-fluid" style="height: 160px; width: 160px;">
        <h5 class="mt-2 font-weight-bold">Bangladesh Navy</h5>
        <p class=" text-justify mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
      <div class="col-md-4">
        <!-- <i class="fas fa-fighter-jet fa-5x" style="color: #3696ED"></i> -->
        <img src="<?php echo base_url()?>assets/images/logo/airforce.png" class="img-fluid" style="height: 160px; width: 160px;">
        <h5 class="mt-2 font-weight-bold">Bangladesh Air-Force</h5>
        <p class=" text-justify mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
    </div>
  </section>


  <section class="text-center mb-5" style="margin-top: 5rem;">
    <h3 class="font-weight-bold text-danger mb-5">Courses for Bangladesh Army Navy and Air-Force</h3>
    <div class="row mt-4 align-items-center">
      <div class="col-md-4">
        <h5 class="font-weight-bold mb-4 mt-2">প্রিলিমিনারি</h5>
        <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco</p>
        <div class="row mt-5">
          <div class="col-sm-4"></div>
          <div class="col-sm-4">
            <a href="<?php echo base_url()?>pages/preliminary" class="btn btn-primary btn-block mb-3">More Info</a>
          </div>
          <div class="col-sm-4"></div>
        </div>
      </div>
      <div class="col-md-4">
        <h5 class="font-weight-bold mb-4 mt-2">লিখিত</h5>
        <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco</p>
        <div class="row mt-5">
          <div class="col-sm-4"></div>
          <div class="col-sm-4">
            <a href="<?php echo base_url()?>pages/written" class="btn btn-primary btn-block mb-3">More Info</a>
          </div>
          <div class="col-sm-4"></div>
        </div>
      </div>
      <div class="col-md-4">
        <h5 class="font-weight-bold mb-4 mt-2">আইএসএসবি</h5>
        <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco</p>
        <div class="row mt-5">
          <div class="col-sm-4"></div>
          <div class="col-sm-4">
            <a href="<?php echo base_url()?>pages/issb" class="btn btn-primary btn-block mb-3">More Info</a>
          </div>
          <div class="col-sm-4"></div>
        </div>
      </div>
    </div>
  </section>
</div>