<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minijuego de Drag and Drop</title>
    <link rel="stylesheet" href="<?= base_url('/css/style.css') ?>">
</head>
<body>
    <!-- Modal con las instrucciones -->
    <div id="instruction-modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="startGame()">&times;</span>
            <p>Arrastra los objetos a su contenedor correspondiente. Evita fallar ya que te restarán puntos. Termina antes del tiempo para pasar al siguiente nivel.</p>
        </div>
    </div>

    <div id="game-container">
        <div class="score-container">
            <p id="score">Puntuación: 0</p>
        </div>

        <div class="category" id="category1" data-category="A"></div>
        <div class="category" id="category2" data-category="B"></div>
        <div class="category" id="category3" data-category="C"></div>
        <div class="category" id="category4" data-category="D"></div>

        <div class="draggable" id="object1" data-category="A" draggable="true" ondragstart="drag(event)">Objeto 1</div>
        <div class="draggable" id="object2" data-category="B" draggable="true" ondragstart="drag(event)">Objeto 2</div>
        <div class="draggable" id="object3" data-category="C" draggable="true" ondragstart="drag(event)">Objeto 3</div>
        <div class="draggable" id="object4" data-category="D" draggable="true" ondragstart="drag(event)">Objeto 4</div>
        <div class="draggable" id="object5" data-category="A" draggable="true" ondragstart="drag(event)">Objeto 5</div>
        <div class="draggable" id="object6" data-category="B" draggable="true" ondragstart="drag(event)">Objeto 6</div>
        <div class="draggable" id="object7" data-category="C" draggable="true" ondragstart="drag(event)">Objeto 7</div>
        <div class="draggable" id="object8" data-category="D" draggable="true" ondragstart="drag(event)">Objeto 8</div>
        <div class="draggable" id="object9" data-category="A" draggable="true" ondragstart="drag(event)">Objeto 9</div>
        <div class="draggable" id="object10" data-category="B" draggable="true" ondragstart="drag(event)">Objeto 10</div>
        <div class="draggable" id="object11" data-category="C" draggable="true" ondragstart="drag(event)">Objeto 11</div>
        <div class="draggable" id="object12" data-category="D" draggable="true" ondragstart="drag(event)">Objeto 12</div>
        <div class="draggable" id="object13" data-category="A" draggable="true" ondragstart="drag(event)">Objeto 13</div>
        <div class="draggable" id="object14" data-category="B" draggable="true" ondragstart="drag(event)">Objeto 14</div>
        <div class="draggable" id="object15" data-category="C" draggable="true" ondragstart="drag(event)">Objeto 15</div>
        <div class="draggable" id="object16" data-category="D" draggable="true" ondragstart="drag(event)">Objeto 16</div>
    </div>

    <script src="<?= base_url('/js/game.js') ?>"></script>
</body>
</html>
