<?php 
  use dwes\app\utils\Utils;
?>

<!-- Principal Content Start -->
   <div id="index">

    <!-- Header -->
      <div class="row">
         <div class="col-xs-12 intro">
            <div class="carousel-inner">
               <div class="item active">
                <img class="img-responsive" src="/dwes.local/public/images/index/woman.jpg" alt="header picture">
               </div>
               <div class="carousel-caption">
                  <h1>FIND NICE PICTURES HERE</h1>
                  <hr>
               </div>
            </div>
         </div>
      </div>

      <div id="index-body">
      <!-- Pictures Navigation table -->
        <div class="table-responsive">
          <table class="table text-center">
            <thead>
              <tr>
              
              <?php 
              $act = 'active';
              echo '<td><a class="link ';
              if (Utils::esOpcionMenuActiva('/index.php')==true || Utils::esOpcionMenuActiva('/')==true || Utils::esOpcionMenuActiva('/index.php?category=1')==true)
                {
                  $idCategoria = 1;
                  echo $act;
                }
              
              echo '" href="?category=1" data-toggle="tab">category I</a></td>';
              
              echo '<td><a class="link ';
              if (Utils::esOpcionMenuActiva('/index.php?category=2')==true)
                {
                  $idCategoria = 2;
                  echo $act;
                }
              echo '" href="?category=2" data-toggle="tab">category II</a></td>';    
echo '<td><a class="link ';
              if (Utils::esOpcionMenuActiva('/index.php?category=3')==true)
                {
                  $idCategoria = 3;
                  echo $act;
                }
              echo '" href="?category=3" data-toggle="tab">category III</a></td>';
              ?>
              </tr>
            </thead>
          </table>
          <hr>
        </div>
      
      <!-- Navigation Table Content -->
        <div class="tab-content">

        <!-- First Category pictures -->
        <?php 
          shuffle($imagenesHome);
          require_once __DIR__ .'/imagen-index.part.php';
        ?>
        <!-- End of First category pictures -->

        <!--second category pictures -->
        <!-- Third Category Pictures -->
        

        </div>
    <!-- End of Navigation Table Content -->
      </div><!-- End of Index-body box -->

    <!-- Newsletter form -->
      <div class="index-form text-center">
        <h3>SUSCRIBE TO OUR NEWSLETTER </h3>
        <h5>Suscribe to receive our News and Gifts</h5>
        <form class="form-horizontal">
          <div class="form-group">
            <div class="col-xs-12 col-sm-6 col-sm-push-3 col-md-4 col-md-push-4">
            <input class="form-control" type="text" placeholder="Type here your email address">
            <a href="" class="btn btn-lg sr-button">SUBSCRIBE</a>
            </div>
          </div>
        </form>
      </div>
    <!-- End of Newsletter form -->  

    <!-- Box within partners name and logo -->
      <div class="last-box row">
        <div class="col-xs-12 col-sm-4 col-sm-push-4 last-block">
        <div class="partner-box text-center">
          <p>
          <i class="fa fa-map-marker fa-2x sr-icons"></i> 
          <span class="text-muted">35 North Drive, Adroukpape, PY 88105, Agoe Telessou</span>
          </p>
          <h4>Our Main Partners</h4>
          <hr>
          <div class="text-muted text-left">
            <?php require_once __DIR__ .'/indexlogos.view.part.php'; ?>
          </div>
        </div>
        </div>
      </div>
    <!-- End of Box within partners name and logo -->

   </div><!-- End of index box -->