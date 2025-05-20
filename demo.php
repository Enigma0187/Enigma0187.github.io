  <?php
  include("header.php");
  $paginaname = 'FAQ';
  ?>
<div class="main-content">
  <div class="page-content">
    <div class="container-fluid">
      <div class="row row-flex-group">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">

              <h4 class="card-title">StormWall</h4>
              <p class="card-title-desc">3 Concurrents</p>

              <div class="">
                <a href="assets/images/stormwall.jpg" target="_blank"><img src="assets/images/stormwall.jpg"  class="img-fluid" alt="Responsive image"></a>
              </div>
            </div>
          </div>
        </div>
        <!--STORM-->
               <div class="col-lg-6">
          <div class="card">
            <div class="card-body">

              <h4 class="card-title">Sucuri</h4>
              <p class="card-title-desc">2 Concurrents</p>

              <div class="">
                <a href="assets/images/sucuri.jpg" target="_blank"><img src="assets/images/sucuri.jpg"  class="img-fluid" alt="Responsive image"></a>
              </div>
            </div>
          </div>
        </div>
       <!--SUCURI-->
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">

              <h4 class="card-title">Proxy Method</h4>
              <p class="card-title-desc">1 Concurrents</p>

              <div class="">
                <a href="assets/images/proxy.jpg" target="_blank"><img src="assets/images/proxy.jpg"  class="img-fluid" alt="Responsive image"></a>
              </div>
            </div>
          </div>
        </div>
     <!--HYPER-->
            <div class="col-lg-6">
          <div class="card">
            <div class="card-body">

              <h4 class="card-title">Hyper</h4>
              <p class="card-title-desc">4 Concurrents</p>

              <div class="">
                <a href="assets/images/hyper.jpg" target="_blank"><img src="assets/images/hyper.jpg"  class="img-fluid" alt="Responsive image"></a>
              </div>
            </div>
          </div>
        </div>
   <!--req/s-->
           <div class="col-lg-6">
          <div class="card">
            <div class="card-body">

              <h4 class="card-title">CloudFlare UAM</h4>
              <p class="card-title-desc">2 Concurrents</p>

              <div class="">
                <a href="assets/images/cloudflare.jpg" target="_blank"><img src="assets/images/cloudflare.jpg"  class="img-fluid" alt="Responsive image"></a>
              </div>
            </div>
          </div>
        </div>
 <!--SUCURI-->
</div>
<!--/col-lg-6-->
</div>
</div>			   	  
<?php
require('xwaf.php');
$xWAF = new xWAF();
$xWAF->start();
?>