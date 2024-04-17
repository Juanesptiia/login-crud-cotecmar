<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AGREGAR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    .bg-custom {
        background-color: #07417a;
    }
</style>

<body>
    <h1 class="bg-custom p-2 text-white text-center">Agregar</h1>
    <br>
    <div class="container">
        <form action="../CRUD/insertarDatos.php" method="POST">
            <!-- <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">ID Pieza</label>
                <input type="email" class="form-control">

            </div> -->
            <label for="">Pieza</label>
            <select class="form-select mb-3" name="Piezas">
                <option selected disabled>--Seleccionar Pieza--</option>
                <?php
                include("../php/conexion.php");

                $sql = $conexion->query("SELECT * FROM piezas");
                while ($resultado = $sql->fetch_assoc()) {
                    echo "<option value='" . $resultado['IDpieza'] . "'>" . $resultado['nombre_pieza'] . "</option>";
                }

                ?>

            </select>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Peso teorico</label>
                <input type="text" class="form-control" name="PesoT">

            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Peso real</label>
                <input type="text" class="form-control" name="PesoR">

            </div>
            

            <label for="">Estado</label>
            <select class="form-select mb-3" name="estados">
                <option selected disabled>--Seleccionar estado--</option>
                <option>Fabricado</option>
                <option>Pendiente</option>

                <?php
                include("../php/conexion.php");

                $sql = $conexion->query("SELECT * FROM reportes");
                while ($resultado = $sql->fetch_assoc()) {
                    echo "<option value='" . $resultado['estado'] . "'>" . $resultado['estado'] . "</option>";
                }

                ?>
            </select>

            

            <label for="">Proyecto</label>
            <select class="form-select mb-3" name="proyectos">
                <option selected disabled>--Seleccionar proyecto--</option>
                <?php
                include("../php/conexion.php");

                $sql = $conexion->query("SELECT * FROM proyecto");
                while ($resultado = $sql->fetch_array()) {
                    echo "<option value='" . $resultado['IDproyecto'] . "'>" . $resultado['IDproyecto'] . "</option>";
                }
                ?>

                       
            </select>


            <label for="">Bloque</label>
            <select class="form-select mb-3" name="bloques">
                <option selected disabled>--Seleccionar bloque--</option>
                <?php
                include("../php/conexion.php");

                $sql = $conexion->query("SELECT * FROM bloque");
                while ($resultado = $sql->fetch_assoc()) {
                    echo "<option value='" . $resultado['IDbloque'] . "'>" . $resultado['nombre_bloque'] . "</option>";
                }
                ?>
            </select>


            <div class="mb-3">
                <label for="fechaActual" class="form-label">Fecha de registro</label>
                <input type="date" class="form-control" name="fecha" id="fechaActual" readonly>
            </div>
            <label for="">Registrado por</label>
            <select class="form-select mb-3" name="registroP">
                <option selected disabled>--Registrado por:</option>
                <?php
                include("../php/conexion.php");

                $sql = $conexion->query("SELECT * FROM usuarios");
                while ($resultado = $sql->fetch_assoc()) {
                    echo "<option value='" . $resultado['usuario'] . "'>" . $resultado['usuario'] . "</option>";
                }
                ?>
                <br>
            </select>
            <div class="text-center">
                <button type="submit" class="btn btn-danger">Enviar</button>
                <a href="../index-crud.php" class="btn btn-dark">Regresar</a>
            </div>
    </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Obtener la fecha actual en formato "YYYY-MM-DD"
            var fechaActual = new Date().toISOString().split('T')[0];
            // Asignar la fecha actual al campo de entrada
            document.getElementById("fechaActual").value = fechaActual;
        });
    </script>
</body>

</html>