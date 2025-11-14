<?php

use dwes\app\utils\Utils;

?>
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
      <a class="navbar-brand page-scroll" href="#page-top">
        <span>[PHOTO]</span>
      </a>
    </div>
    <div class="collapse navbar-collapse navbar-right" id="menu">
      <ul class="nav navbar-nav">

        <?php if (Utils::esOpcionMenuActiva('index.php')): ?>
          <li class="active lien">
        <?php else: ?>
          <li class="lien">
        <?php endif; ?>
          <a href="<?= BASE_URL ?>"><i class="fa fa-home sr-icons"></i> Home</a>
        </li>

        <?php if (Utils::esOpcionMenuActiva('galeria')): ?>
          <li class="active lien">
        <?php else: ?>
          <li class="lien">
        <?php endif; ?>
          <a href="<?= BASE_URL ?>/galeria"><i class="fa fa-bookmark sr-icons"></i> Galería</a>
        </li>

        <?php if (Utils::esOpcionMenuActiva('about')): ?>
          <li class="active lien">
        <?php else: ?>
          <li class="lien">
        <?php endif; ?>
          <a href="<?= BASE_URL ?>/about"><i class="fa fa-info-circle sr-icons"></i> About</a>
        </li>

        <?php if (Utils::esOpcionMenuActiva('blog')): ?>
          <li class="active lien">
        <?php else: ?>
          <li class="lien">
        <?php endif; ?>
          <a href="<?= BASE_URL ?>/blog"><i class="fa fa-file-text sr-icons"></i> Blog</a>
        </li>

        <?php if (Utils::esOpcionMenuActiva('asociados')): ?>
          <li class="active lien">
        <?php else: ?>
          <li class="lien">
        <?php endif; ?>
          <a href="<?= BASE_URL ?>/asociados"><i class="fa fa-users sr-icons"></i> Asociados</a>
        </li>

        <?php if (Utils::esOpcionMenuActiva('contact')): ?>
          <li class="active lien">
        <?php else: ?>
          <li class="lien">
        <?php endif; ?>
          <a href="<?= BASE_URL ?>/contact"><i class="fa fa-phone-square sr-icons"></i> Contact</a>
        </li>

      </ul>
    </div>
  </div>
</nav>
<!-- End of Navigation Bar -->
