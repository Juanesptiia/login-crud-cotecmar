<?php
  include("../php/conexion.php");

   $pieza = $_POST['Piezas'];
   /* $pesoT = $_POST['PesoT']; */
   $pesoR = $_POST['PesoR'];
   $estado = $_POST['estados'];
   $proyecto = $_POST['proyectos'];
   $bloque = $_POST['bloques'];
   $fechaR = $_POST['fecha'];
   $registroPer = $_POST['registroP'];


   $sql = "INSERT INTO reportes (pieza_id,peso_real,estado,id_proyecto,bloque_id,fecha_reg,usuario_id) VALUES
   ('$pieza','$pesoR','$estado','$proyecto','$bloque','$fechaR','$registroPer')";

     $resultado = mysqli_query($conexion, $sql);

     if ($resultado === true) {
        header("location:../index-crud.php");
        exit; 
     } else {
        echo "Datos NO insertados.". mysqli_error($conexion);
     }
     



?>