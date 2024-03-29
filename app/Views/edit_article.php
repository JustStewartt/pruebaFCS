<!DOCTYPE html>
<html>
<head>
  <title>Editar Articulo</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    .container {
      max-width: 500px;
    }
    .error {
      display: block;
      padding-top: 5px;
      font-size: 14px;
      color: red;
    }
  </style>
    <script src="https://cdn.tiny.cloud/1/lkzacumv5gg2qtzvxl6xowjhns8guqgptqotviq4u3ehhdhc/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
  selector: 'textarea',
  menubar: '',
  toolbar: 'bold italic alignleft aligncenter alignright alignjustify'
});
    </script>
</head>
<body>
  <div class="container mt-5">
    <form method="post" id="update_article" name="update_article" 
    action="<?= site_url('/update') ?>">
      <input type="hidden" name="id" id="id" value="<?php echo $article_obj['id']; ?>">
      <div class="form-group">
        <label>Titulo</label>
        <input type="text" name="titulo" class="form-control" value="<?php echo $article_obj['titulo']; ?>">
      </div>
      <div class="form-group">
        <label>Palabras Clave</label>
        <input type="text" name="pClave" class="form-control" value="<?php echo $article_obj['pClave']; ?>">
      </div>
      <div class="form-group">
        <label>Edad Minima</label>
        <input type="text" name="edadMin" class="form-control" value="<?php echo $article_obj['edadMin']; ?>">
      </div>
      <div class="form-group">
        <label>Edad Maxima</label>
        <input type="text" name="edadMax" class="form-control" value="<?php echo $article_obj['edadMax']; ?>">
      </div>
      <div class="form-group">
        <label>Imagen</label>
        <input type="file" name="imagen" class="form-control" value="<?php echo '<img height="80" width="80" src="data:image/jpeg;base64,'.base64_encode($article_obj["imagen"]) ?>">
      </div>
      <div class="form-group">
        <label>Sintesis</label>
        <input type="text" name="sintesis" class="form-control" value="<?php echo $article_obj['sintesis']; ?>">
      </div>
      <div class="form-group">
        <label>Contenido</label>
        <textarea name="contenido" value="<?php echo $article_obj['contenido']; ?>">Hello, World!</textarea>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-danger btn-block">Guardar Datos</button>
      </div>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
  <script>
    if ($("#update_article").length > 0) {
      $("#update_article").validate({
        rules: {
          titulo: {
            required: true,
            maxlength: 150,
          },
          pClave: {
            required: true,
            maxlength: 200,
          },
          sintesis: {
            required: true,
            maxlength: 200,
          },
          contenido: {
            required: true,
          },
        },
        messages: {
          titulo: {
            required: "Titulo requerido",
            maxlength: "Debe tener menos de 150 caracteres",
          },
          pClave: {
            required: "Palabras clave requeridas",
            maxlength: "Debe tener menos de 200 caracteres",
          },
          sintesis: {
            required: "Sintesis requerida",
            maxlength: "Debe tener menos de 200 caracteres",
          },
          contenido: {
            required: "COntenido requerido",
          },
        },
      })
    }
  </script>
</body>
</html>