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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    
    

    <script>
        $(document).ready(function () {
    var puntuacion = 0;
    var nivelActual = 1;
    var tiempoRestante;
    var numObjetos;

    // Definir configuraciones de niveles
    var niveles = [
        { tiempo: 40, numObjetos: 6 },
        { tiempo: 30, numObjetos: 12 },
        { tiempo: 20, numObjetos: 15 }
    ];

    var tiempoRestante = niveles[nivelActual - 1].tiempo;
    var numObjetos = niveles[nivelActual - 1].numObjetos;

    // Función para generar un número aleatorio dentro de un rango
    function getRandomInt(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    // Función para actualizar el tiempo restante en pantalla
    function actualizarTiempo() {
        $('#tiempo').text(tiempoRestante);
    }

    // Mostrar el pop-up de instrucciones al cargar la página
    $('#instruccionesModal').modal('show');

    // Inicializar el juego al hacer clic en "Comenzar Juego" en el pop-up de instrucciones
    $('#comenzarJuegoBtn').on('click', function() {
        $('#instruccionesModal').modal('hide');
        iniciarJuego();

    // Función para crear objetos aleatorios
    function crearObjetos() {
        for (var i = 0; i < numObjetos; i++) {
            var objeto = $('<div class="objeto">' + categorias[getRandomInt(0, 3)] + '</div>');
            objeto.data('categoria', categorias[i % 4]);
            $('#contenedor-objetos').append(objeto);
        }
    }

    // Iniciar el cronómetro
    var cronometro = setInterval(function () {
        tiempoRestante--;

        if (tiempoRestante >= 0) {
            actualizarTiempo();
        } else {
            // El tiempo ha terminado, pasar al siguiente nivel o mostrar pantalla de felicitación
            clearInterval(cronometro);
            if (nivelActual < niveles.length) {
                nivelActual++;
                tiempoRestante = niveles[nivelActual - 1].tiempo;
                numObjetos = niveles[nivelActual - 1].numObjetos;
                reiniciarJuego();
            } else {
                // Mostrar pantalla de felicitación
                mostrarFelicitacion();
            }
        }
    }, 1000);

    // Función para reiniciar el juego al pasar al siguiente nivel
    function reiniciarJuego() {
        $('#contenedor-objetos').empty();
        crearObjetos();
        $('.objeto').draggable({
            revert: 'invalid',
            cursor: 'move'
        });
        actualizarTiempo();
    }

    // Función para mostrar la pantalla de felicitación
    function mostrarFelicitacion() {
        $('#contenedor-juego').empty();
        $('#contenedor-juego').append('<h2 class="text-center">¡Felicidades! Has completado todos los niveles.</h2>');
        $('#contenedor-juego').append('<h3 class="text-center">Puntuación final: ' + puntuacion + '</h3>');
    }

   

    // Hacer que los contenedores sean soltables
    $('.categoria').droppable({
        accept: '.objeto',
        drop: function (event, ui) {
            var objeto = ui.draggable;
            var categoriaObjeto = objeto.data('categoria');
            var categoriaContenedor = $(this).data('categoria');

            if (categoriaObjeto === categoriaContenedor) {
                objeto.draggable('disable');
                objeto.position({ of: $(this), my: 'left top', at: 'left top' });
                objeto.draggable('option', 'revert', false);
                sumarPuntos(5);
            } else {
                sumarPuntos(-5);
            }
        }
    });
    $('.objeto').draggable({
    revert: function(droppableObj) {
        // Revertir solo si no se clasificó correctamente en la categoría de destino
        return !droppableObj || !droppableObj.hasClass('categoria');
    },
    cursor: 'move'
});




});}
)
    </script>
</body>
</html>
