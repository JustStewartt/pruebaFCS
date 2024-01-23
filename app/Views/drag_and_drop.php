<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drag and Drop Game</title>
    <style>
        .category {
            border: 2px solid #ccc;
            padding: 10px;
            margin: 10px;
            min-height: 100px;
        }

        .item {
            border: 1px solid #ddd;
            padding: 10px;
            margin: 10px 0;
            cursor: move;
        }
    </style>
</head>
<body>

    <h2>Drag and Drop Game</h2>

    <div id="category1" class="category" ondrop="drop(event, 1)" ondragover="allowDrop(event)"></div>
    <div id="category2" class="category" ondrop="drop(event, 2)" ondragover="allowDrop(event)"></div>
    <div id="category3" class="category" ondrop="drop(event, 3)" ondragover="allowDrop(event)"></div>
    <div id="category4" class="category" ondrop="drop(event, 4)" ondragover="allowDrop(event)"></div>

    <div id="item1" class="item" draggable="true" ondragstart="drag(event)">Item 1</div>
    <div id="item2" class="item" draggable="true" ondragstart="drag(event)">Item 2</div>
    <div id="item3" class="item" draggable="true" ondragstart="drag(event)">Item 3</div>
    <div id="item4" class="item" draggable="true" ondragstart="drag(event)">Item 4</div>

    <script>
        function allowDrop(event) {
            event.preventDefault();
        }

        function drag(event) {
            event.dataTransfer.setData("text", event.target.id);
        }

        function drop(event, category) {
            event.preventDefault();
            var itemId = event.dataTransfer.getData("text");
            var itemElement = document.getElementById(itemId);
            var categoryElement = document.getElementById("category" + category);

            // Update category in the database
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "<?= site_url('game/updateCategory') ?>", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("itemId=" + itemId + "&category=" + category);

            // Move item to the new category
            categoryElement.appendChild(itemElement);
        }
    </script>

</body>
</html>
