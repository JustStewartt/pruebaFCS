let score = 0;
let level = 1;
let maxObjects = 6;
let timer;

function updateScore() {
    document.getElementById('score').innerText = `Puntuación: ${score}`;
}

function updateLevel() {
    document.getElementById('level').innerText = `Nivel: ${level}`;
}

function updateTimer(seconds) {
    document.getElementById('timer').innerText = `Tiempo: ${formatTime(seconds)}`;
}

function formatTime(seconds) {
    const minutes = Math.floor(seconds / 60);
    const remainingSeconds = seconds % 60;
    return `${minutes}:${remainingSeconds < 10 ? '0' : ''}${remainingSeconds}`;
}

function startTimer(seconds) {
    timer = setInterval(function () {
        seconds--;
        updateTimer(seconds);

        if (seconds === 0) {
            clearInterval(timer);
            endLevel();
        }
    }, 1000);
}

function addDragStartListener(element) {
    element.addEventListener('dragstart', drag);
}

function drag(event) {
    event.dataTransfer.setData('text/plain', event.target.id);
}

function addDragOverListener(element) {
    element.addEventListener('dragover', allowDrop);
}

function allowDrop(event) {
    event.preventDefault();
}

function addDropListener(element) {
    element.addEventListener('drop', drop);
}

function drop(event) {
    event.preventDefault();
    const data = event.dataTransfer.getData('text/plain');
    const draggedElement = document.getElementById(data);
    const targetCategory = event.target;

    if (targetCategory.classList.contains('category')) {
        const objectCategory = draggedElement.getAttribute('data-category').trim();
        const targetCategoryId = targetCategory.getAttribute('data-category').trim();

        if (objectCategory === targetCategoryId) {
            targetCategory.appendChild(draggedElement);
            score += 5; // Suma 5 puntos si es correcto
        } else {
            alert('¡Error! El objeto no pertenece a esta categoría.');
            score -= 5; // Resta 5 puntos si es incorrecto
        }

        updateScore();
    }
}

function startGame() {
    document.getElementById('instruction-modal').style.display = 'none';
    startLevel();
}

function startLevel() {
    score = 0;
    updateLevel();
    updateTimer(getLevelDuration(level));
    updateScore();

    // Lógica para cargar y mostrar objetos según el nivel
    const draggableElements = document.querySelectorAll('.draggable');
    draggableElements.forEach(draggableElement => {
        draggableElement.style.display = 'none';
    });

    const visibleObjects = getRandomObjects(maxObjects);
    visibleObjects.forEach(object => {
        const element = document.getElementById(object);
        element.style.display = 'block';
        addDragStartListener(element);
    });

    startTimer(getLevelDuration(level));
}

function getRandomObjects(number) {
    const allObjects = ['object1', 'object2', 'object3', 'object4', 'object5', 'object6', 'object7', 'object8', 'object9', 'object10', 'object11', 'object12', 'object13', 'object14', 'object15', 'object16'];
    const shuffledObjects = allObjects.sort(() => Math.random() - 0.5);
    return shuffledObjects.slice(0, number);
}

function getLevelDuration(level) {
    switch (level) {
        case 1:
            return 40;
        case 2:
            return 30;
        case 3:
            return 20;
        default:
            return 0;
    }
}

function endLevel() {
    clearInterval(timer);

    if (score > 0) {
        alert(`¡Nivel ${level} completado! Puntuación total: ${score}`);
        if (level < 3) {
            level++;
            maxObjects = level * 5;
            startLevel();
        } else {
            alert('¡Felicidades! Has completado todos los niveles.');
        }
    } else {
        const restartGame = confirm('Juego terminado. ¿Quieres reiniciar?');
        if (restartGame) {
            level = 1;
            maxObjects = 6;
            startLevel();
        }
    }
}

// Mostrar el modal al cargar la página
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('instruction-modal').style.display = 'block';
    updateScore();
});

const categories = document.querySelectorAll('.category');

categories.forEach(category => {
    addDragOverListener(category);
    addDropListener(category);
});

// Agregar divs adicionales para mostrar información
const infoContainer = document.createElement('div');
infoContainer.innerHTML = '<p id="level">Nivel: 1</p><p id="timer">Tiempo: 00:00</p>';
document.body.insertBefore(infoContainer, document.getElementById('game-container'));
