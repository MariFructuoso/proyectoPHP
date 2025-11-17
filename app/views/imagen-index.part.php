<?php

    echo '<div id="category'.$idCategoria.'" class="tab-pane active" >
              <div class="row popup-gallery">';

    foreach ($imagenesHome as $imagen) {
        if ($imagen->getCategoria() === $idCategoria)

        echo '<div class="col-xs-12 col-sm-6 col-md-3">
                <div class="sol">
                  <img class="img-responsive" src="'.$imagen->getUrlPortfolio().'" alt="'.$imagen->getDescripcion().'">
                  <div class="behind">
                      <div class="head text-center">
                        <ul class="list-inline">
                          <li>
                            <a class="gallery" href="'.$imagen->getUrlGaleria().'" data-toggle="tooltip" data-original-title="Quick View">
                              <i class="fa fa-eye"></i>
                            </a>
                          </li>
                          <li>
                            <a href="#" data-toggle="tooltip" data-original-title="Click if you like it">
                              <i class="fa fa-heart"></i>
                            </a>
                          </li>
                          <li>
                            <a href="#" data-toggle="tooltip" data-original-title="Download">
                              <i class="fa fa-download"></i>
                            </a>
                          </li>
                          <li>
                            <a href="#" data-toggle="tooltip" data-original-title="More information">
                              <i class="fa fa-info"></i>
                            </a>
                          </li>
                        </ul>
                      </div>
                      <div class="row box-content">
                        <ul class="list-inline text-center">
                          <li><i class="fa fa-eye"></i> '.$imagen->getNumVisualizaciones().'</li>
                          <li><i class="fa fa-heart"></i> '.$imagen->getNumLikes().'</li>
                          <li><i class="fa fa-download"></i> '.$imagen->getNumDownloads().'</li>
                        </ul>
                      </div>
                  </div>
                </div>
              </div>';
    }

        $active = ' class="active"';

              echo '<nav class="text-center">
                <ul class="pagination">
                  <li';
                  if ($idCategoria === 1)
                    echo $active;
                echo '  ><a href="?category=1">1</a></li>
                  <li';
                  if ($idCategoria === 2)
                    echo $active;
                echo ' ><a href="?category=2">2</a></li>
                  <li';
                  if ($idCategoria === 3)
                    echo $active;
                echo '><a href="?category=3">3</a></li>';
                  
                  
                echo '<li><a href="#" aria-label="suivant">
                    <span aria-hidden="true">&raquo;</span>
                  </a></li>
                </ul>
              </nav>';

           echo '</div> 
           </div>'; // end of row popup-gallery y category
?>