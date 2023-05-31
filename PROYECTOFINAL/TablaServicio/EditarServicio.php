<!DOCTYPE html>
<html>
<title>Editar Proveedor</title>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Editar Servicio</h3>
                            <?php
                            require_once('../config.inc.php');

                            // Obtener el ID de la compra
                            $idServicio = $_POST['idServicio'];

                            // Crear la conexión a la base de datos
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Verificar la conexión
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            // Consulta para obtener los datos de la compra
                            $consulta = "SELECT * FROM servicio WHERE idServicio = $idServicio";
                            $resultado = $conn->query($consulta);

                            // Verificar si se encontraron resultados
                            if ($resultado->num_rows > 0) {
                                // Obtener los datos de la compra
                                $registro = $resultado->fetch_assoc();

                                // Mostrar el formulario con los datos de la compra
                                echo '<form action="ModificarServicio.php" method="post">';
                                echo '<div class="form-outline mb-4">';
                                echo '<input type="text" name="nombre" id="form3Example1q" class="form-control" value="' . $registro['nombre'] . '"/>';
                                echo '<label class="form-label" for="form3Example1q">Nombre</label>';
                                echo '</div>';
                                echo '<div class="form-outline mb-4">';
                                echo '<input type="text" name="precio" id="form3Example1q" class="form-control" value="' . $registro['precio'] . '"/>';
                                echo '<label class="form-label" for="form3Example1q">Precio</label>';
                                echo '</div>';
                                echo '<div class="form-outline mb-4">';
                                echo '<input type="text" name="duracion" id="form3Example1q" class="form-control" value="' . $registro['duracion'] . '"/>';
                                echo '<label class="form-label" for="form3Example1q">Duracion</label>';
                                echo '</div>';
                                echo '<div class="form-outline mb-4">';
                                echo '<input type="text" name="descripcion" id="form3Example1q" class="form-control" value="' . $registro['descripcion'] . '"/>';
                                echo '<label class="form-label" for="form3Example1q">Descripcion</label>';
                                echo '</div>';
                                echo '<input type="hidden" name="idServicio" value="' . $idServicio . '"/>';
                                echo '<button type="submit" class="btn btn-success btn-lg mb-1">Actualizar</button>';
                                echo '</form>';
                            } else {
                                echo '<p>No se encontraron datos para Servicio seleccionado.</p>';
                            }

                            // Cerrar la conexión a la base de datos
                            $conn->close();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>