<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minijuego</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        /* Estilos CSS */
        .categoria {
            width: 100px;
            height: 100px;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            line-height: 100px;
        }

        .objeto {
            width: 80px;
            height: 80px;
            background-color: #28a745;
            color: #fff;
            text-align: center;
            line-height: 80px;
            cursor: move;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Pop-up de instrucciones -->
        <div class="modal fade" id="instruccionesModal" tabindex="-1" role="dialog" aria-labelledby="instruccionesModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="instruccionesModalLabel">Instrucciones</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Arrastra los objetos a su contenedor correspondiente. Evita fallar ya que te restarán puntos. Termina antes del tiempo para pasar al siguiente nivel.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Comenzar Juego</button>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="text-center mb-4">Minijuego de Arrastrar y Soltar</h2>

        <!-- Puntuación actual -->
        <div class="text-center mb-3">
            <h4>Puntuación: <span id="puntuacion">0</span></h4>
            <div class="d-flex justify-content-end">
        <a href="<?php echo site_url('/articulos') ?>" class="btn btn-info mb-2">Menu Principal</a>
  </div>
        </div>

        <div id="contenedor-juego" class="row">
            <?php foreach ($categorias as $categoria) : ?>
                <div class="col-md-3">
                    <div class="categoria" data-categoria="<?= $categoria['nombre'] ?>"><?= $categoria['nombre'] ?></div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div id="contenedor-objetos" class="d-flex justify-content-around flex-wrap">
                    <?php foreach ($objetos as $objeto) : ?>
                        <div class="objeto" data-categoria="<?= $objeto['categoria_id'] ?>"><?= $objeto['nombre'] ?></div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="<?= base_url('public/js/script.js') ?>"></script>

    <script>
    </script>
</body>
</html>
