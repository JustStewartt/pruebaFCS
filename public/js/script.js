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



});}
)
