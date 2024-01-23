<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Artículo</title>
</head>
<body>
    <h1><?= $article['titulo']; ?></h1>
    <?php echo '<img height="80" width="80" src="data:image/jpeg;base64,'.base64_encode($article["imagen"]).'"/>' ?>
    <p><?= $article['contenido']; ?></p>
    <p>Fecha: <?= $article['fecha']; ?></p>
    <a href="<?= base_url('articulos'); ?>">Volver a la lista</a>
</body>
</html>
