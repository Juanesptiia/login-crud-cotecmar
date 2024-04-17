<?php

session_start();

if (!isset($_SESSION['usuario'])) {

  echo '
         <script>
             alert("Debes de iniciar sesión antes");
              window.location = "index.php";
         </script>
    
    ';
  session_destroy();
  die();
}
/* session_destroy(); */


?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
   integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>


<body>
  <div class="container"></div>
  <h1 class="text-center" style="background-color: #07417a; color:white">LISTADO</h1>
  <div class="container">
    <br>
    <table class="table table-bordered">
      <thead class= "table-dark">
        <tr>
          <th scope="col">ID Pieza</th>
          <th scope="col">Pieza</th>
          <th scope="col">Peso teorico</th>
          <th scope="col">Peso real</th>
          <th scope="col">Estado</th>
          <th scope="col">Proyecto</th>
          <th scope="col">Bloque</th>
          <th scope="col">Fecha de registro</th>
          <th scope="col">Registrado por</th>
          <th scope="col">Accciones</th>
        </tr>
      </thead>


      <?php

      require("php/conexion.php");


     

      $sql = $conexion->query("SELECT * FROM reportes
          INNER JOIN usuarios ON reportes.usuario_id = usuarios.usuario
          INNER JOIN piezas ON reportes.pieza_id = piezas.IDpieza
          INNER JOIN bloque ON reportes.bloque_id = bloque.IDbloque
          INNER JOIN proyecto ON reportes.id_proyecto = proyecto.IDproyecto



        ");

      while ($resultado = $sql->fetch_assoc()) {
       


      ?>


        <tr>
          <th scope="row"><?php echo $resultado['pieza_id'] ?></th>
          <th scope="row"><?php echo $resultado['nombre_pieza'] ?></th>
          <th scope="row"><?php echo $resultado['peso_teorico'] ?></th>
          <th scope="row"><?php echo $resultado['peso_real'] ?></th>
          <th scope="row"><?php echo $resultado['estado'] ?></th>
          <th scope="row"><?php echo $resultado['id_proyecto'] ?></th>
          <th scope="row"><?php echo $resultado['bloque_id'] ?></th>
          <th scope="row"><?php echo $resultado['fecha_reg'] ?></th>
          <th scope="row"><?php echo $resultado['usuario_id'] ?></th>
          <th >
            <a href="Formularios/EditarForm.php?" class="btn btn-warning">Editar</a>
            <a href=""class="btn btn-danger">Eliminar</a>
          </th>

        </tr>

      <?php
      }
      ?>

      <tbody>

      </tbody>
    </table>
  <div class = "container">
    <a href="Formularios/AgregarForm.php" class= "btn btn-success">Agregar</a>
  </div>
  </div>

  <!-- <a href = "php/cerrar_sesion.php"> cerrar sesión </a> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>