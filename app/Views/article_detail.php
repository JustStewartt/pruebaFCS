<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Artículo</title>
</head>
<body>
    <h1><?= $articulo['titulo']; ?></h1>
    <img src="<?= $articulo['imagen']; ?>" alt="Imagen principal">
    <p><?= $articulo['contenido']; ?></p>
    <p>Fecha: <?= $articulo['fecha']; ?></p>
    <a href="<?= base_url('articulos'); ?>">Volver a la lista</a>
</body>
</html>
