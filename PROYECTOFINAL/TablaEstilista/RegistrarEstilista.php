<!DOCTYPE html>
<html>
<title>Registrar Estilista</title>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>

@media (min-width: 1025px) {
.h-custom {
height: 100vh !important;
}
}
</style>
</head>
<body>
<section class="h-100 h-custom" style="background-color: #F7BDEB;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-8 col-xl-6">
        <div class="card rounded-3">
         
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Registrar Estilista</h3>

            <form action="InsertarDatos.php" method="post">

              <div class="form-outline mb-4">
                <input type="text" name="nombre" id="form3Example1q" class="form-control" />
                <label class="form-label" for="form3Example1q">Nombre</label>
              </div>

              <div class="form-outline mb-4">
                <input type="text" name="apellidopaterno" id="form3Example1q" class="form-control" />
                <label class="form-label" for="form3Example1q">Apellido Paterno</label>
              </div>

              <div class="form-outline mb-4">
                <input type="text" name="apellidomaterno" id="form3Example1q" class="form-control" />
                <label class="form-label" for="form3Example1q">Apellido Materno</label>
              </div>

              <div class="form-outline mb-4">
                <input type="text" name="edad" id="form3Example1q" class="form-control" />
                <label class="form-label" for="form3Example1q">Edad</label>
              </div>

              <div class="form-outline mb-4">
                  <label class="form-label">Encargada</label>
                  <select class="form-control" name="encargada">
                    <?php
                    require_once('../config.inc.php');
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    $consulta = "SELECT * FROM encargada";
                    $result = $conn->query($consulta);
                    while ($row = $result->fetch_assoc()) {
                      echo "<option value='" . $row['idEncargada'] . "'>" . $row['nombre'] . "</option>";
                    }
                    $conn->close();
                    ?>
                  </select>
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label">Cliente</label>
                  <select class="form-control" name="cliente">
                    <?php
                    require_once('../config.inc.php');
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    $consulta = "SELECT * FROM cliente";
                    $result = $conn->query($consulta);
                    while ($row = $result->fetch_assoc()) {
                      echo "<option value='" . $row['idCliente'] . "'>" . $row['nombre'] . "</option>";
                    }
                    $conn->close();
                    ?>
                  </select>
                </div>


              <button type="submit" class="btn btn-success btn-lg mb-1">Registrar</button>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>