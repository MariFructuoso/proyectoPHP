<?php
use dwes\app\utils\Utils;

$imgAsocCopy = Utils::extraeElementosAleatorios($imgAsociados, 3);

foreach ($imgAsocCopy as $asociado) {
  echo '<ul class="list-inline">
              <li><img src="'.$asociado->getUrl().'" alt="'.$asociado->getDescripcion().'"></li>
              <li>'.$asociado->getNombre().'</li>
            </ul>';
}
