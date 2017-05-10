<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LANPREST - CIFP TXURDINAGA LHII</title>

    <link rel="stylesheet" type="text/css" href="/css/estilos.css" media="screen" />

    <!-- Bootstrap -->
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./css/estilos.css" media="screen" />
    <!-- TinyMCE -->
    <script src="./tinymce/js/tinymce/tinymce.min.js"></script>

               <script>
               tinymce.init({
                selector: '#LPcurriculum',
                language: 'es',
                height: 500,
                theme: 'modern',
                plugins: [
                  'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                  'searchreplace wordcount visualblocks visualchars code fullscreen',
                  'insertdatetime media nonbreaking save table contextmenu directionality',
                  'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
                ],
                toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
                image_advtab: true,
                templates: [
                  { title: 'Test template 1', content: 'Test 1' },
                  { title: 'Test template 2', content: 'Test 2' }
                ],
                content_css: [
                  '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                  '//www.tinymce.com/css/codepen.min.css'
                ]
               });
              </script>

</head>


      <?php
// CONEXION BD
include './includes/conex.php';

//COMPROBACION DE CONTRASEÑA y CREACION DE SESSION ////
$consulta = 'SELECT LPid from ikasleak where LPcorreo="'.$_POST['LOcorreo'].'" AND LPpassword="'.$_POST['LOpassword'].'"';
$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos DE ENTRADA");
// echo "PROBANDO ",$consulta;  //COMPROBACIONES !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!1111
while ($columna = mysqli_fetch_array( $resultado )) { $LPid=$columna['LPid'];}

// iniciar session 1 vez
if ($LPid>0){  $_SESSION['LDid'] = $LPid;  }
if (!isset($_SESSION['LDid'])) {header('Location: index.php');}

//ACTUALIZAR FECHA CONEXION A ACTUALIZAL
$current_date = date("Y-m-d H:i:s");
$consulta='UPDATE ikasleak SET LPdate="'.$current_date.'" WHERE LPid='.$_SESSION['LDid'];
$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la ACTUALIZACION DE LA FECHA");


// ACTUALIZAR DATOS DI RECIBE CORREO ELECTRONICO !!!!!!!!!!!!!!!!!!!11111

          if (strlen($_POST['LPcorreo'])>0) {
            $consulta = 'UPDATE ikasleak SET LPcorreo="'.$_POST['LPcorreo'].'",LPpassword="'.$_POST['LPpassword'].'",
              LPnombre="'.$_POST['LPnombre'].'",LPapellidos="'.$_POST['LPapellidos'].'",
              LPact="'.$_POST['LPact'].'",LPaset="'.$_POST['LPaset'].'",LPmovil="'.$_POST['LPmovil'].'",
              LPest="'.$_POST['LPest'].'",LPdfor="'.$_POST['LPdfor'].'",LPdtra="'.$_POST['LPdtra'].'",
              LPcurriculum="'.htmlspecialchars($_POST['LPcurriculum']).'" WHERE LPid='.$_SESSION['LDid'];
        //   echo "<br>PROBANDO ACTUALIZAR ",$consulta;  //COMPROBACIONES !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!1111
            $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la ACTUALIZACION");
          }

//CARGA DE DATOS DE LA BD
          $consulta = 'SELECT * from ikasleak where LPid='.$_SESSION['LDid'];
          $resultado = mysqli_query( $conexion, $consulta ) or die ( "<br>Algo ha ido mal en la consulta a la base de datos DE CARGA DE DATOS");


?>

<body>



<?php
//PASAR A VARIABLES LOS RESULTADOS
while ($columna = mysqli_fetch_array( $resultado )) {
$LPid=$columna['LPid'];
$LPcorreo=$columna['LPcorreo'];
$LPpassword=$columna['LPpassword'];
$LPnombre=$columna['LPnombre'];
$LPapellidos=$columna['LPapellidos'];
$LPmovil=$columna['LPmovil'];
$LPact=$columna['LPact'];
$LPaset=$columna['LPaset'];
$LPest=$columna['LPest'];
$LPdfor=$columna['LPdfor'];
$LPdtra=$columna['LPdtra'];
$LPcurriculum=$columna['LPcurriculum'];
$LPdate=$columna['LPdate'];
}
  ?>


 <img class="profilelogo-img" src="./imagenes/logoTX.png" alt="">

 <div class="alert alert-info" role="alert">       <strong><span class="glyphicon glyphicon-user" aria-hidden="true"></span> FICHA PERSONAL: </strong> <?php echo $LPnombre.', '.$LPapellidos; ?>      </div>

 <div class="alert alert-success" role="alert">
       <?php
        //CARGAR CURSOS MATRICULADO
        $consulta2 = 'SELECT kurso.KUano,kurso.KUtipof,kurso.KUfamilia,kurso.KUdesc FROM ikasleak,KUIK,kurso WHERE ikasleak.LPid=KUIK.LPid and KUIK.KUid=kurso.KUid AND ikasleak.LPid="'.$LPid.'" ORDER BY kurso.KUid DESC';
        $resultado2 = mysqli_query( $conexion, $consulta2 ) or die ( "<br>Algo ha ido mal en la consulta a la base de datos DE CARGA DE DATOS");
        while ($columna2 = mysqli_fetch_array( $resultado2 )) { echo "<p>".$columna2['KUano']." <strong>".$columna2['KUtipof']."</strong> ".$columna2['KUfamilia']." <strong>".$columna2['KUdesc']."</strong></p>"; }
        ?>
  </div>

  <div class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Última conexion:</strong> <?php echo $LPdate; ?>
  </div>

<!-- SELECT kurso.KUano,kurso.KUtipof,kurso.KUfamilia,kurso.KUdesc FROM ikasleak,KUIK,kurso WHERE ikasleak.LPid=KUIK.LPid and KUIK.KUid=kurso.KUid   -->
<!-- FORMULARIO -->

      <form action="ikasle.php" method="post" >

          <p><button type="submit" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Guardar</button>
            <a href="logout.php" class="btn btn-sm btn-info" ><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> Salir</a></p>

    <!--      <p><input value='Guardar' type="submit" class="btn btn-sm btn-success" />  <a href="logout.php" class="btn btn-sm btn-info" >Cerrar Sesión</a></p> -->

          <input type="hidden" class="form-control" id="LPcorreo" value="<?php     echo $LPid;     ?>" name="LPid">

          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <p><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>  ESTADOS</p>
                  </a>
                </h4>
              </div>
              <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                  <div class="checkbox">
                    <label>
                    <input type="checkbox" name='LPact'  value='1' <?php   if ($LPact=='1') {echo "Checked";};     ?> > En Activo
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                    <input type="checkbox" name='LPaset' value='1' <?php   if ($LPaset=='1') {echo "Checked";};     ?>  > Trabajo relacionado con el sector
                    </label>
                  </div>
                <div class="checkbox">
                  <label>
                  <input type="checkbox" name='LPest'  value='1' <?php   if ($LPest=='1') {echo "Checked";};     ?> > Estudia
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                  <input type="checkbox" name='LPdfor'  value='1' <?php   if ($LPdfor=='1') {echo "Checked";};     ?> > Demanda Formaciòn
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                  <input type="checkbox" name='LPdtra'  value='1' <?php   if ($LPdtra=='1') {echo "Checked";};     ?> > Demanda Estudios
                  </label>
                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <p><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  PERFIL</p>
                  </a>
                </h4>
              </div>
              <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Teléfono</label>
                    <input type="text" class="form-control" id="LPmovil" value="<?php     echo $LPmovil;     ?>" name="LPmovil">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Correo Electronico</label>
                    <input type="email" class="form-control" id="LPcorreo" value="<?php     echo $LPcorreo;     ?>" name="LPcorreo">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="text" class="form-control" id="LPpassword" value="<?php     echo $LPpassword;     ?>" name="LPpassword">
                  </div>
                </div>
              </div>
            </div>




             <input type="hidden" class="form-control" id="LPnombre" value="<?php     echo $LPnombre;     ?> " name="LPnombre">
             <input type="hidden" class="form-control" id="LPapellidos" value="<?php     echo $LPapellidos;     ?>" name="LPapellidos">

        <br>
          <textarea id="LPcurriculum" name="LPcurriculum">
        <?php     echo $LPcurriculum;     ?>
          </textarea>

      </form>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="./bootstrap/js/bootstrap.min.js"></script>


<!-- MODALES -->
<!-- Button trigger modal -->

<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
Probando MODAL
</button>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



  </body>
</html>

<?php mysqli_close( $conexion ); ?>
