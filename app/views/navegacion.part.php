<?php use dwes\app\utils\Utils; ?>

<!-- Navigation Bar -->
   <nav class="navbar navbar-fixed-top navbar-default">
     <div class="container">
         <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a  class="navbar-brand page-scroll" href="#page-top">
              <span>[PHOTO]</span>
            </a>
         </div>
         <div class="collapse navbar-collapse navbar-right" id="menu">
            <ul class="nav navbar-nav">
              <?php if (Utils::esOpcionMenuActiva('/index.php')==true || Utils::esOpcionMenuActiva('/')==true)
                echo '<li class="active lien">'; else echo '<li class=”lien”>';?>
              <a href="/">Home</a></li>

              <?php if (Utils::esOpcionMenuActiva('/galeria')==true)
                echo '<li class="active lien">'; else echo '<li class=”lien”>';?>
              <a href="/galeria">Galería</a></li>

              <?php if (Utils::esOpcionMenuActiva('/asociados')==true)
                echo '<li class="active lien">'; else echo '<li class=”lien”>';?>
              <a href="/asociados">Asociados</a></li>

              <?php if (Utils::esOpcionMenuActiva('/about')==true)
                echo '<li class="active lien">'; else echo '<li class=”lien”>';?>
              <a href="/about">About</a></li>
              
              <?php if (Utils::esOpcionMenuActiva('/blog')==true)
                echo '<li class="active lien">'; else echo '<li class=”lien”>';?>
              <a href="/blog">Blog</a></li>

              <?php if (Utils::esOpcionMenuActiva('/contact')==true)
                echo '<li class="active lien">'; else echo '<li class=”lien”>';?>
              <a href="/contact"><i class="fa fa-phone-square sr-icons"></i> Contact</a></li>

            </ul>
         </div>
     </div>
   </nav>
<!-- End of Navigation Bar -->