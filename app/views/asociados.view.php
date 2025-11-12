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
                    <p class="text-white">Nuestros asociados y colaboradores.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Principal Content Start -->
<div id="asociados">
    <div class="container">
        <div class="col-xs-12 col-sm-8 col-sm-push-2">
            <h2>Registrar nuevo asociado</h2>
            <hr>
            <!-- Sección que muestra la confirmación del formulario o bien sus errores -->
            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
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
            <!-- Formulario de alta de asociados-->
            <form class="form-horizontal" action="<?= BASE_URL ?>/asociados" method="post"
                enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Logo del asociado</label>
                        <input class="form-control-file" type="file" name="logo">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Nombre del asociado</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= trim($nombre) ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Descripción</label>
                        <textarea class="form-control" name="descripcion"><?= $descripcion ?></textarea>
                    </div>
                </div>

                <button class="pull-right btn btn-lg sr-button">ENVIAR</button>
            </form>
            <hr class="divider">
            <div class="lista-asociados">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Logo</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($asociados as $asociado): ?>
                            <tr>
                                <td>
                                    <?php $logoUrl = BASE_URL . '/' . $asociado->getUrlLogo(); ?>
                                    <img src="<?= $logoUrl ?>" 
                                         alt="<?= htmlspecialchars($asociado->getNombre()) ?>"
                                         title="<?= htmlspecialchars($asociado->getNombre()) ?>"
                                         width="100px">
                                    <!-- Debug: mostrar la ruta de la imagen -->
                                    <div class="small text-muted"><?= $logoUrl ?></div>
                                </td>
                                <td><?= htmlspecialchars($asociado->getNombre()) ?></td>
                                <td><?= htmlspecialchars($asociado->getDescripcion()) ?></td>
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
