<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center" style="background-color: #07417a; color:white">EDITAR</h1>
<br>
    <form class ="container">
        <?php
        include_once('../php/conexion.php');

        
        
        
        
        
        ?>

        <label>Pieza</label>
        <select class="form-select mb-3" aria-label="Default select example">
            <option selected disabled>--Seleccione pieza--</option>
            <option>One</option>
            
        </select>
        
        <div class="mb-3">
            <label  class="form-label">Peso Teorico</label>
            <input type="text" class="form-control" name="PesoT" >
        </div>
        
        <div class="mb-3">
            <label  class="form-label">Peso Real</label>
            <input type="text" class="form-control" name="PesoR">
        </div>
        <label>Estado</label>
        <select class="form-select mb-3 " aria-label="Default select example">
            <option selected>--Estado--</option>
            <option >One</option>
            <option >Two</option>
            
        </select>
        <label>Proyecto</label>
        <select class="form-select mb-3"  aria-label="Default select example">
            <option selected>--Proyecto--</option>
            <option >One</option>
            
        </select>
        <label>Bloque</label>
        <select class="form-select mb-3" aria-label="Default select example">
            <option selected>--bloque--</option>
            <option >One</option>
           
        </select>
        <label>Registrado Por</label>
        <select class="form-select mb-3" aria-label="Default select example">
            <option selected>--Registrado por:--</option>
            <option >One</option>
            
        </select>
        <div class="text-center">
        <button type="submit" class="btn btn-danger">Actualizar</button>
        <a href="../index-crud.php" class ="btn btn-dark">Regresar</a>

        </div>
        
    </form>




</body>

</html>