<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Artículos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  
</head>
<body>
<div class="p-4 p-lg-5 bg-light rounded-3 text-center">
    <h1 class="display-5 fw-bold">Breaking News</h1>
    <div class="d-flex justify-content-end">
        <a href="<?php echo site_url('/drag-and-drop') ?>" class="btn btn-info mb-2">Mini Juego</a>
  </div>
    </div>

    <section class="pt-4">
            <div class="container px-lg-5">
            <div class="row gx-lg-5">

    <?php foreach ($articles as $article): ?>
        <div lass="col-lg-6 col-xxl-4 mb-5">
        <?php echo '<img height="200" width="200" src="data:image/jpeg;base64,'.base64_encode($article["imagen"]).'"/>' ?>
            <h2 class="fs-4 fw-bold"><?= $article['titulo']; ?></h2>
            <p class="mb-0"><?= $article['sintesis']; ?></p>
            <a href="<?= base_url('articulos/detalle/' . $article['id']); ?>">Ver más</a>
        </div>
    <?php endforeach; ?>
    </div>
    </div>
        </section>
</body>
</html>
