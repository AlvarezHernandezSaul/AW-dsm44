<?php
include_once ('../BD/conexion.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin RavenGames</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
      <!-- Custom styles for this page -->
      <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">




</head>

<body id="page-top">

<?php
include './layauts/menunavbar.php';
include './controller/participcontroller.php';
    ?>


                
  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tabla de Participantes</h1>

        

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Datos de la Tabla Participantes</h6>
    </div>
    <div class="col-md-3">
        <a type="text" class="btn btn-success" tabindex="-1" role="button" href="agregarparticip.php">Agregar Participante</a>  
        </div> 
   
        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID participante</th>
                                            <th>Nombre de Juego</th>
                                            <th>Nombre Usuario</th>
                                            <th>Nombre de Evento</th> 
                                            <th>Fecha</th>
                                            <th>ID de Juego</th>
                                            <th>    </th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID participante</th>
                                            <th>Nombre de Juego</th>
                                            <th>Nombre Usuario</th>
                                            <th>Nombre de Evento</th> 
                                            <th>Fecha</th>
                                            <th>ID de Juego</th>
                                            <th>    </th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php

                                            if ($resultado = $conexion->query($consultaparticip)) {

                                                /* obtener el array de objetos */
                                                while ($obj = $resultado->fetch_object()) {
                                    ?>
                                            <tr>
                                                <td><?= $obj->idparticipante ?></td>
                                                <td><?= $obj->nombrejuego?></td>
                                                <td><?= $obj->nombreus ?></td>
                                                <td><?= $obj->nombreeve?></td>
                                                <td><?= $obj->fecha ?></td>
                                                <td><?= $obj->idjuego ?></td>
                                                <td>
                                                <form action="./controller/deleteparticip.php" method="post">
                                                <input type="hidden" name="delete_id" value="<?php echo $obj->idparticipante ?>">
                                                <button type="submit" name="delete_btn" class="btn btn-danger"> Eliminar</button>
                                                </form>
                                        
                                                </td>
                                        
                                    
                                                </td>
                                            </tr>
                                            
                                           
                                                
                                                
                                        <?php
                                                  
                                            
                                        }

                                           /* liberar el conjunto de resultados */
                                           //$resultado->close();
                                        }
                                        ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
            


</div>
            <!-- End of Main Content -->

            <?php
include './layauts/allfooter.php'
?>
</body>

</html>