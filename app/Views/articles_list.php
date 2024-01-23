<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Artículos</title>
</head>
<body>
    <h1>Breaking News</h1>

    <?php foreach ($articles as $article): ?>
        <div>
        <?php echo '<img height="200" width="200" src="data:image/jpeg;base64,'.base64_encode($article["imagen"]).'"/>' ?>
            <h2><?= $article['titulo']; ?></h2>
            <p><?= $article['sintesis']; ?></p>
            <a href="<?= base_url('articulos/detalle/' . $article['id']); ?>">Ver más</a>
        </div>
    <?php endforeach; ?>
</body>
</html>
