<?php 

  session_start();
  
  include("conexion.php");

  $usuario = $_POST['usuario'];
  $contraseña = $_POST['contraseña'];

  $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario= '$usuario' and contraseña= '$contraseña'");


   if (mysqli_num_rows($validar_login) > 0){

       $_SESSION['usuario'] = "usuario";
       header("location: ../index-crud.php");
       exit;
   }else{
      
    echo '
        <script>
          alert ("usuario no identificado");

          window.location = "../index.php";

          </script>
    
    ';
     exit;

   }


?>