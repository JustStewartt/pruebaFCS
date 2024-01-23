<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Artículos</title>
</head>
<body>
    <h1>Breaking News</h1>

    <?php foreach ($articulos as $articulo): ?>
        <div>
            <img src="<?= $articulo['imagen']; ?>" alt="Imagen previa">
            <h2><?= $articulo['titulo']; ?></h2>
            <p><?= $articulo['sintesis']; ?></p>
            <a href="<?= base_url('articulos/detalle/' . $articulo['id']); ?>">Ver más</a>
        </div>
    <?php endforeach; ?>
</body>
</html>
