<!DOCTYPE html>
<html>
<title>Tabla Representante</title>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link href="estilo.css" rel="stylesheet">
</head>
<style>
   .button-container {
    display: flex;
    gap: 5px;
}

.button-containerr {
    display: flex;
    justify-content: center;
    gap: 15px; /* Espacio entre los botones */
  }

.export-button {
        margin-top: 100px;
    }
</style>
<body>
<h1>Tabla Representante</h1>
<div>
<?php
    require_once('../config.inc.php');


    $conn = new mysqli($servername,$username,$password,$dbname);
    $consulta="select * from representante";
    $datos = $conn->query($consulta);

    echo "<table class ='table table-striped table-dark'>";
    echo "
    <th scope=col>Nombre</th>
    <th scope=col>Apellido Paterno</th>
    <th scope=col>Apellido Materno</th>
    <th scope=col>Telefono</th>
    <th scope=col></th>";

    while ($registro = $datos->fetch_assoc())
    {
        echo "<tr>";
        echo "<td class='table-secondary'>".$registro["nombre"]."</td>";
        echo "<td class='table-secondary'>".$registro["apellidopaterno"]."</td>";
        echo "<td class='table-secondary'>".$registro["apellidomaterno"]."</td>";
        echo "<td class='table-secondary'>".$registro["telefono"]."</td>";
        echo "<td class='table-secondary'>
        <div class='button-container'>
        <form action='EliminarRepresentante.php' method='post'>
            <input type='hidden' name='idRepresentante' value='" . $registro["idRepresentante"] . "'>
            <input class='btn btn-primary' type='submit' name='eliminar_".$registro["idRepresentante"]."' value='Eliminar'>
        </form>
        <form action='EditarRepresentante.php' method='post'>
            <input type='hidden' name='idRepresentante' value='" . $registro["idRepresentante"] . "'>
            <input class='btn btn-primary' type='submit' name='modificar_".$registro["idRepresentante"]."' value='Modificar'>
        </form>
        </div>
              </td>";
        echo "<td class='table-secondary'></td>";
        echo "<tr/>";
        echo "</div>";
    }

echo "</table>";
$conn->close();
?>

<div class="button-containerr">
  
  <form action="RegistrarCita.php" method="get">
    <input class="btn btn-primary" type="submit" value="Insertar">
  </form>
  <form action="../menu/menu.html" method="post" class="export-button">
    <input class="btn btn-primary" type="submit" value=" Regresar al menu">
  </form>
  <form action="pdf.php" method="post" class="export-button">
    <input class="btn btn-primary" type="submit" value="Exportar PDF">
  </form>
  <form action="excel.php" method="post" class="export-button">
    <input class="btn btn-primary" type="submit" value="Exportar Excel">
  </form>
  <form action="xml.php" method="post" class="export-button">
    <input class="btn btn-primary" type="submit" value="Exportar XML">
  </form>
  <form action="jason.php" method="post" class="export-button">
    <input class="btn btn-primary" type="submit" value="Exportar JSON">
  </form>
</div>
</body>
</html>