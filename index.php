<?php include("bd.php") ?>

<?php


$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT * FROM formulario";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DataTables.js</title>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css" rel="stylesheet">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://kit.fontawesome.com/8e2cfbc1a9.js" crossorigin="anonymous"></script>
    <!-- Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <!-- DataTable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS -->

</head>

<body>

    <div class="container">
        <h1 class="text-center">CRUD</h1>
        <h1 class="text-center">datatables</h1>
        <div class="row">
            <div class="col-2 offset-10">
                <div class="text-center">
                    <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalCRUD" id="btnNuevo">
                        crear usuario
                    </button>
                </div>
            </div>
        </div>

        <div class="container my-4">

            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table id="tablaPersonas" class="table table-bordered border-primary" style="width:100%">
                                <thead class="text-center">
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Dni</th>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Apellido</th>
                                        <th class="text-center">Edad</th>
                                        <th class="text-center">fecha_nac</th>
                                        <th class="text-center">Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($data as $dat) {
                                    ?>
                                        <tr>
                                            <td><?php echo  $dat['id']; ?></td>
                                            <td><?php echo  $dat['dni']; ?></td>
                                            <td><?php echo  $dat['nombre']; ?></td>
                                            <td><?php echo  $dat['apellido']; ?></td>
                                            <td><?php echo  $dat['edad']; ?></td>
                                            <td><?php echo  $dat['fecha_nac']; ?></td>
                                            <td></td>




                                            <!-- PRUEBA
                                            <button class='class="fa-solid fa-pen-to-square fa-beat" btnEditar'>Editar</button>

                                            class="fa-solid fa-pen-to-square fa-beat">



                                                <button class="fa-solid fa-trash fa-beat  btnBorrar">Borrar</button>

                                            -->


                                        </tr>






                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="formPersonas" action="guardar.php">
                        <di class="modal-centent">
                            <div class="modal-body">
                                <label for="txtDni" class="form-label"> DNI</label>
                                <input name="dni" id="dni" type="text" class="form-control" value="" placeholder="Update Title">

                                <label for="nombre" class="form-label">NOMBRE</label>
                                <input name="nombre" id="nombre" type="text" class="form-control" value="" placeholder="Update Title">

                                <label for="apellido" class="form-label">APELLIDO</label>
                                <input name="apellido" id="apellido" type="text" class="form-control" value="" placeholder="Update Title">

                                <label for="edad" class="form-label">EDAD</label>
                                <input name="edad" id="edad" type="text" class="form-control" value="" placeholder="Update Title">



                                <label for="formGroupExampleInput" class="form-label">Fecha Nac</label>
                                <input type="date" name="fecha_nac" id="fecha_nac" class="form-control">

                            </div>
                            <div class="modal-footer">
                                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- DataTable -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <!-- Custom JS -->
    <script src="data.js"></script>
</body>

</html>