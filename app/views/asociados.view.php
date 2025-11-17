<?php
require_once __DIR__ . '/inicio.part.php';
require_once __DIR__ . '/navegacion.part.php';

?>
<div class="hero hero-inner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mx-auto text-center">
                <div class="intro-wrap">
                    <h1 class="mb-0">Asociados</h1>
                    <p class="text-white">Formulario de alta para nuevos asociados. </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Principal Content Start -->
<div id="galeria">
    <div class="container">
        <div class="col-xs-12 col-sm-8 col-sm-push-2">
            <h2>Subir logo:</h2>
            <hr>
            <!-- Sección que muestra la confirmación del formulario o bien sus errores -->
            <?php if ($postRealizado) : ?>
                <div class="alert alert-<?= empty($errores) ? 'info' : 'danger'; ?> alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                    <?php if (empty($errores)) : ?>
                        <p><?= $mensaje ?></p>
                    <?php else : ?>
                        <ul>
                            <?php foreach ($errores as $error) : ?>
                                <li><?= $error ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <!-- Formulario que permite subir una imagen con su descripción -->
            <!-- Hay que indicar OBLIGATORIAMENTE enctype="multipart/form-data" para enviar ficheros al servidor -->
            <form class="form-horizontal" action="/asociados/nuevo" method="post"
                enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Imagen</label>
                        <input class="form-control-file" type="file" name="imgAsoc" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                        <br>
                        <label class="label-control">Descripción (opcional)</label>
                        <textarea class="form-control" name="descripcion"></textarea>

                        <!-- CAPTCHA -->
                        <br>
                        <label class="label-control">Introduce el captcha <img style="border: 1px solid #D3D0D0 " src="/app/utils/Captcha.php" id='captcha'></label>
                        <input class="form-control" type="text" name="captcha">
                        <br>
                        <button class="pull-right btn btn-lg sr-button">ENVIAR</button>
                    </div>
                </div>
            </form>
            <hr class="divider">
            <div class="imagenes_galeria">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Logo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($imagenesAsoc as $imagen) : ?>
                            <tr>
                                <th scope="row"><?= $imagen->getNombre() ?></th>
                                <td>
                                    <img src="<?= $imagen->getUrl() ?>"
                                        alt="<?= $imagen->getNombre() ?>"
                                        title="<?= $imagen->getDescripcion() ?>"
                                        width="100px">
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
require_once __DIR__ . '/fin.part.php';
