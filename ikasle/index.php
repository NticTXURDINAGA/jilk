<?php session_start(); ?>
<?php
if (!isset($_SESSION['Idni'])) {header('Location: ../index.php');}
?>

<!DOCTYPE html>
<html lang="es">
<head>

<?php
include '../includes/head.php';
include '../includes/conex.php';
?>
<script>
function activar(campo)
{
    var estadoActual = document.getElementById(campo);
    estadoActual.disabled = !estadoActual.disabled;
}
</script>

<script src='../tinymce/js/tinymce/tinymce.min.js'></script>

           <script>
           tinymce.init({
             selector: '#Icurri',
             language: 'es',
             height: 500,
             menubar: false,
             plugins: [
               'advlist autolink lists link image charmap print preview anchor',
               'searchreplace visualblocks code fullscreen',
               'insertdatetime media table contextmenu paste code'
             ],
             toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
             content_css: '//www.tinymce.com/css/codepen.min.css'
           });

           tinymce.init({
            selector: '#Icurri_antiguo',
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

//poner fecha actual de acceso
$current_date = date("Y-m-d H:i:s");
$consulta = 'UPDATE ikasle SET
  Itime="'.$current_date.'"
  WHERE Idni="'.$_SESSION['Idni'].'"';

$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la ACTUALIZACION");


//poner tipo a 1
$consulta = 'UPDATE ikasle SET
  Itipo="A"
  WHERE Idni="'.$_SESSION['Idni'].'"';

// echo $consulta;
$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la ACTUALIZACION");



//ACTUALIZANDO

if (strlen($_POST['Imail'])>0) {
  $consulta = 'UPDATE ikasle SET
    Imail="'.$_POST['Imail'].'",
    Itelefono="'.$_POST['Itelefono'].'",
    Iact="'.$_POST['Iact'].'",
    Iest="'.$_POST['Iest'].'",
    Idact="'.$_POST['Idact'].'",
    Idest="'.$_POST['Idest'].'",
    Iacts="'.$_POST['Iacts'].'",
    Iemp="'.$_POST['Iemp'].'",
    Icurri="'.htmlspecialchars($_POST['Icurri']).'"

    WHERE Idni="'.$_SESSION['Idni'].'"';
  // echo $consulta;  //COMPROBACIONES !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!1111
$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la ACTUALIZACION");
}


//if (($_POST['JILKcorreo']=='admin@fptxurdinaga.com') AND ($_POST['JILKdni']=='admin'))
//COMPROBACION DE CONTRASEÑA y CREACION DE SESSION ////

$consulta = 'SELECT * from ikasle where Idni="'.$_SESSION['Idni'].'"';
//echo $consulta;
$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos DE SESSION no PILLADA");
// echo "PROBANDO ",$consulta;  //COMPROBACIONES !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!1111
while ($columna = mysqli_fetch_array( $resultado )) {
  $Idni=$columna['Idni'];
  $Inombrea=$columna['Inombrea'];
  $Imail=$columna['Imail'];
  $Itelefono=$columna['Itelefono'];
  $Iact=$columna['Iact'];
  $Iest=$columna['Iest'];
  $Idact=$columna['Idact'];
  $Idest=$columna['Idest'];
  $Iacts=$columna['Iacts'];
  $Iemp=$columna['Iemp'];
  $Itime=$columna['Itime'];
  $Itipo=$columna['Itipo'];

  $Icurri=$columna['Icurri'];
}

?>

<body>
  <div class="container theme-showcase" role="main">
      <h3>no muestra</h3>
      <form action="#" method="post" >

  <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> JILK Txurdinaga</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
        <!--    <li ><button type="submit" class="btn btn-link"><span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Guardar</button></li> -->
            <li ><a href="../logout.php"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> Cerrar Sesion</a></li>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

 <img class="profilelogo-img" src="../imagenes/logoTX.png" alt="">


          <p><button type="submit" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Guardar</button></p>

          <!-- FECHA DE ACCESO
                     <div class="alert alert-warning alert-dismissible" role="alert">
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                       <strong>Última conexion:</strong> <?php     echo date('d-m-Y',strtotime($Itime));     ?>
                      <strong> Tipo:</strong> <?php     echo $Itipo;     ?>
                     </div>
           FECHA DE ACCESO -->


          <div class="alert alert-info" role="alert">
            <h4><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $Inombrea; ?></h4>
            <?php
              echo '<table class="table">';
                $consulta = 'SELECT * from ik,kurso where kurso.Kcod=ik.Kcod AND Idni="'.$_SESSION['Idni'].'"';
                $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos DE SESSION no PILLADA");
                while ($columna = mysqli_fetch_array( $resultado ))
                 {
                  echo '<tr><td>'.$columna['Kcod'].'</td><td>'.$columna['Kurso'].'</td><td>'.$columna['IKdual'].'</td><td>'.$columna['IKempfct'].'</td><td>'.$columna['IKcont'].'</td></tr>';
                 }
              echo '</table>';
            ?>
          </div>



<!-- PROBANDO ACORDEON -->




<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-info" >
    <div  class="panel-heading" role="tab" id="headingOne">
      <h4  class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <span class="glyphicon glyphicon-random" aria-hidden="true"></span>  CONTACTO
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
                      <div class="form-group">
                          <label for="exampleInputEmail1">Teléfonos</label>
                          <input type="text" class="form-control" id="Itelefono" value="<?php     echo $Itelefono;     ?>" name="Itelefono">
                      </div>

                      <div class="form-group">
                          <label for="exampleInputEmail1">Correo Electronico</label>
                          <input type="text" class="form-control" id="Imail" value="<?php     echo $Imail;     ?>" name="Imail">
                      </div>
      </div>
    </div>
  </div>
  <div class="panel panel-info">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>  SITUACION LABORAL
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
                    <div class="checkbox">
                      <label>
                      <input type="checkbox" name='Iact'  value='TRAB'  onclick="activar('Iemp');activar('Iacts')" <?php   if ($Iact=='TRAB') {echo "Checked";};     ?> > En Activo.
                      </label>
                    </div>


                    <div class="form-group">
                      <label for="exampleInputEmail1">Empresa</label>
                      <input type="text" class="form-control" id="Iemp" <?php if ($Iact!='TRAB') {echo 'disabled';};?> value="<?php     echo $Iemp;     ?>" name="Iemp">
                    </div>

                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name='Iacts' id='Iacts' <?php if ($Iact!='TRAB') {echo 'disabled';};?>  value='SI' <?php   if ($Iacts=='SI') {echo "Checked";};     ?> > Empresa del Sector.
                      </label>
                    </div>
                    <div class="checkbox">
                      <label>
                      <input type="checkbox" name='Idact' id='Idact' value='DTRAB' <?php   if ($Idact=='DTRAB') {echo "Checked";};     ?> > Demandas Trabajo.
                      </label>
                    </div>
      </div>
    </div>
  </div>
  <div class="panel panel-info">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>  SITUACION ACADEMICA
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name='Iest'  value='ESTU' <?php   if ($Iest=='ESTU') {echo "Checked";};     ?> > Estudias.
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name='Idest'  value='DESTU' <?php   if ($Idest=='DESTU') {echo "Checked";};     ?> > DemandaS Formación.
                        </label>
                      </div>
      </div>
    </div>
  </div>


  <div class="panel panel-info">
    <div class="panel-heading" role="tab" id="headingFour">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
          <span class="glyphicon glyphicon-duplicate" aria-hidden="true"></span>  CURRICULUM VITAE
        </a>
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
      <div class="panel-body">
                  <textarea id="Icurri" name="Icurri">
                <?php     echo $Icurri;     ?>
                  </textarea>
      </div>
    </div>
  </div>




</div>

<!-- PROBANDO ACORDEON

        <br>
          <textarea id="Icurri" name="Icurri">
        <?php     echo $Icurri;     ?>
          </textarea>

-->

      </form>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>


<!-- DPF -->
<?php
$apdf='<h2>CURRICULUM VITAE</h2>';
$apdf=$apdf.$Idni.'<br>'.$Inombrea.'<br>'.$Imail.'<br>'.$Itelefono.'<br><br><br>'.$Icurri;

 ?>
<br>
  <form action="../includes/mpdf.php" method="post" >
    <input type="hidden" class="form-control" id="pdf" value="<?php     echo $apdf;     ?>" name="pdf">
    <button type="submit" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> PDF en pruebas</button>
  </form>


</div>
  </body>
</html>

<?php mysqli_close( $conexion ); ?>
