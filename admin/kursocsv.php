<?php session_start();
if ($_SESSION['JILKquien']!='yes') {header("Location: ../index.php");}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<?php
include '../includes/head.php';
include '../includes/conex.php';
?>
</head>
<body>

<?php include '../includes/menu.php'; ?>
<div class="container theme-showcase" role="main">


      <h3>no muestra</h3>
      <h3>CARGA KURSO CSV</h3>

      <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>FALTA CONTROLAR FORMATO DE ARCHIVO !!!!! </strong>
          </div>

  <p><a href='../tmp/kursok.csv'> Modelo de Kursos CSV </a></p>

  <form method="post" action="#" enctype="multipart/form-data" >
          <div class="form-group">
            <!--  <label for="exampleInputFile">Selecionar CSV</label> -->
          <div class="form-group">    <input type="hidden" class="form-control" value="1" name="Kque"></div>
          <div class="form-group">    <input type="file" id="exampleInputFile" name="newcsv" class="btn btn-default"></div>
            <!--  <p class="help-block">Example block-level help text here.</p> -->
            <div class="form-group">  <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-play" aria-hidden="true"></span></button></div>


        </div>
  </form>

<?php

if ($_POST['Kque']=='1') {
              // FALTA COMPROBAR TAMAÑO, EXTENSION y SI ESTA VACIO
                          // FALTA COMPROBAR TAMAÑO, EXTENSION y SI ESTA VACIO
                                      // FALTA COMPROBAR TAMAÑO, EXTENSION y SI ESTA VACIO
            move_uploaded_file($_FILES['newcsv']['tmp_name'], "../tmp/newKcsv.csv");

$Cerror="";
// MOSTRAR CONRTENIDO CSV

            $NOlinea=0;
            $fila = 1;
            if (($gestor = fopen("../tmp/newKcsv.csv", "r")) !== FALSE) {
                while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {

                    //EVITAR LINEA 1
                    if ($NOlinea==1)
                    {
                    //$numero = count($datos); //para controlar que estan los 4 datos
                    // echo $datos[0].' '.$datos[1].' '.$datos[2].' '.$datos[3].' '.$datos[4].' '.$datos[5].' '.$datos[6].'<br>';
                    $Kcod=$datos[0];
                    $Kurso=$datos[1].' Fami: '.$datos[2].' Grad: '.$datos[3].' '.$datos[4].' '.$datos[5].' '.$datos[6].' '.$datos[7];
                    $consulta='INSERT INTO kurso (Kcod, Kurso) VALUES ("'.$Kcod.'","'.$Kurso.'")';
                  //  echo $kurso;
                    if (!mysqli_query($conexion,$consulta))
                      { $Cerror=$Cerror.' CODIGO DUPLICADO: '.$Kcod.'<br>';
                        ?>
                    <!--    <div class="alert alert-warning alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <strong>ARCHIVO PROCESADO CON ERRORES: CODIGO DUPLICADO: </strong> <?php echo mysqli_error($conexion); ?>
                        </div>  -->
                        <?php
                      }
//CARGAR EN ARRAY


                  $fila++;
                  }
                  $NOlinea=1;
                }
                fclose($gestor);
            }
           unlink('../tmp/newKcsv.csv');

           if ($Cerror!="") {
?>


             <div class="alert alert-danger alert-dismissible" role="alert">
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   <strong><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> ARCHIVO PROCESADO CON ERRORES: </strong> <br><?php echo $Cerror; ?>
                 </div>
<?php

           }
  }

?>

    <h3>LISTADO CURSOS</h3>




  <table class="table table-striped">
                <thead>
                  <tr>
                    <th>CODIGO</th>
                    <th>KURSO</th>

                  </tr>
                </thead>
                <tbody>
  <?php
  $consulta='SELECT * FROM kurso';
  $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos DE ENTRADA");
  while ($columna = mysqli_fetch_array( $resultado )) {
  $Kcod=$columna['Kcod'];
  $Kurso=$columna['Kurso'];

  $Kurso=str_replace('Fami','<b class="text-danger">Fami</b>',$Kurso);
  $Kurso=str_replace('Grad','<b class="text-danger">Grad</b>',$Kurso);

  echo '<tr>
    <td>'.$Kcod.'</td>
    <td>'.$Kurso.'</td>

  </tr>';
  }
  ?>
                </tbody>
              </table>



</div>
</body>
<?php include '../includes/pie.php'; ?>
