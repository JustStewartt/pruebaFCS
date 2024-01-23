<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Articulos</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
  <div class="d-flex justify-content-end">
        <a href="<?php echo site_url('/articulos') ?>" class="btn btn-info mb-2">Menu Principal</a>
  </div>
    <div class="d-flex justify-content-end">
        <a href="<?php echo site_url('/article-form') ?>" class="btn btn-success mb-2">Agregar Articulo</a>
      </div>
  <div class="mt-3">
     <table class="table table-bordered" id="article-list">
       <thead>
          <tr>
             <th>Id</th>
             <th>Titulo</th>
             <th>Palabras Clave</th>
             <th>Edad Minima</th>
             <th>Edad Maxima</th>
             <th>Imagen </th>
             <th>Sintesis </th>
             <th>Contenido </th>
             <th>Fecha</th>
          </tr>
       </thead>
       <tbody>
          <?php if($articles): ?>
          <?php foreach($articles as $article): ?>
          <tr>
             <td><?php echo $article['id']; ?></td>
             <td><?php echo $article['titulo']; ?></td>
             <td><?php echo $article['pClave']; ?></td>
             <td><?php echo $article['edadMin']; ?></td>
             <td><?php echo $article['edadMax']; ?></td>
             <td><?php echo '<img height="80" width="80" src="data:image/jpeg;base64,'.base64_encode($article["imagen"]).'"/>' ?></td>
             <td><?php echo $article['sintesis']; ?></td>
             <td><?php echo $article['contenido']; ?></td>
             <td><?php echo $article['fecha']; ?></td>
             <td>
              <a href="<?php echo base_url('edit-article/'.$article['id']);?>" class="btn btn-primary btn-sm">Editar</a>
              <a href="<?php echo base_url('delete/'.$article['id']);?>" class="btn btn-danger btn-sm">Eliminar</a>
              </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>
  </div>
</div>
 
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
      $('#article-list').DataTable();
  } );
</script>
</body>
</html>