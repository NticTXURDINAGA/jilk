<?php session_start(); ?>
<?php
include '../includes/lenguajes.php';

if (!isset($_SESSION['Idni'])) {header('Location: ../index.php');}

//NO CACHE


//IDIOMA
if (isset($_GET['leng'])) {$_SESSION['leng']=$_GET['leng'];}
?>

<!DOCTYPE html>
<html lang="es"  >
<head>
  <!-- EVITAR CACHE PARA LA FOTO -->
  <meta http-equiv="Expires" CONTENT="0">
  <meta http-equiv="Cache-Control" CONTENT="no-cache">
  <meta http-equiv="Pragma" CONTENT="no-cache">


    <script src="../includes/jquery-3.2.1.slim.min.js"></script>

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
function guardar(idFormulario){
        document.forms[idFormulario].submit();
}
function ver_pass() {

        var passwordField = document.getElementById('Ipass');
        var value = passwordField.value;

        	if(passwordField.type == 'password') {	passwordField.type = 'text'; $("#Ipassc").attr('class', 'glyphicon glyphicon-eye-close');	}
        	else {passwordField.type = 'password'; $("#Ipassc").attr('class', 'glyphicon glyphicon-eye-open');	}

        	passwordField.value = value;

}

</script>


<!--              toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',-->
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
             toolbar: 'undo redo |  styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent ',
             content_css: '//www.tinymce.com/css/codepen.min.css'
           });

           </script>

</head>

<?php

//BUBIR FOTO


if(isset($_FILES['upload']['name'])){

  require "../includes/imagen.php";
  $sourcefile= $_FILES['upload']['tmp_name'];
  $endfile= "../imagenes/".$_SESSION['Idni'].".jpg";
  $type=$_FILES['upload']['type'];

  //unlink("../imagenes/".$_SESSION['Idni']);

  makeThumbnail($sourcefile, $max_width=150, $max_height=150, $endfile, $type);

  //Insert into database the file name
  //$query="insert into table values('$endfile')";
	// echo '<img src="'.$endfile.'" />';
  //echo '<br><br><br><br><br><br><br><br><br><br>HAYYYYYYYYYYYYYYYYYYYY:'.$_POST['Imail'];
}

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

    Ipass="'.$_POST['Ipass'].'",

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
  $Ipass=$columna['Ipass'];

  $Icurri=$columna['Icurri'];
}

?>

<body>
  <div class="container theme-showcase" role="main">
      <h3>no muestra</h3>


      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><a class="navbar-brand" href=""><span class="glyphicon glyphicon-home" aria-hidden="true"></span> JILK Txurdinaga</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li ><a href='#' onclick="guardar('general');"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> <?php echo $leng[10][$_SESSION['leng']]; ?></a></li>

              <li ><a href="#" data-toggle="modal" data-target="#myModalcs"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> <?php echo $leng[11][$_SESSION['leng']]; ?></a></li>

            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>





    <!-- Button trigger modal -->

            <!-- Modal -->
            <div class="modal fade" id="myModalcs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?php echo $leng[12][$_SESSION['leng']]; ?></h4>
                  </div>
                  <div class="modal-body">
                    <?php echo $leng[13][$_SESSION['leng']]; ?>

                  </div>
                  <div class="modal-footer">
                    <button  class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> <?php echo $leng[8][$_SESSION['leng']]; ?> </button>
                    <button  class="btn btn-default" onclick="guardar('general');"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> <?php echo $leng[10][$_SESSION['leng']]; ?></button>
                    <button  class="btn btn-default" data-dismiss="modal" onclick="window.location='../logout.php';"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> <?php echo $leng[11][$_SESSION['leng']]; ?></button>


                  </div>
                </div>
              </div>
            </div>

 <img class="profilelogo-img" src="../imagenes/logoTX.png" alt=""><a href="index.php?leng=1" > ES</a> | <a href="index.php?leng=2" >EU </a>







      <!--    <p><button type="submit" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Guardar</button></p> -->

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
              if (file_exists('../imagenes/'.$_SESSION['Idni'].'.jpg')) {
                 $verFoto=$_SESSION['Idni'].'.jpg';
              } else {
                  $verFoto='no_photo';
              }
             ?>

            <img id='imgfoto' class="img-thumbnail" src="../imagenes/<?php echo $verFoto; ?>" />

            <p><a  data-toggle="collapse" href="#verfoto" aria-expanded="false" aria-controls="verfoto" class="btn"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> <?php echo $leng[9][$_SESSION['leng']]; ?> </a></p>

                  <div class="collapse" id="verfoto">
                    <div class="well">
                      <form  class="form-inline" action="#" enctype="multipart/form-data" method="post" id='foto'>

                         <div class="form-group " >
                           <p><input  type="file" id="exampleInputFile" name="upload" ></p>
                           <a href='#' onclick="guardar('foto');" class="btn"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> <?php echo $leng[14][$_SESSION['leng']]; ?></a>
                       </div>
                      </form>
                      <div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <p><?php echo $leng[20][$_SESSION['leng']]; ?></p>
                       </div>
                    </div>
                  </div>



            <br>
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


      <form action="" method="post" id='general' >

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-info" >
    <div  class="panel-heading" role="tab" id="headingOne">
      <h4  class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <span class="glyphicon glyphicon-random" aria-hidden="true"></span>   <?php echo $leng[15][$_SESSION['leng']]; ?>
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
                    <div class="input-group form-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-phone-alt"></i>
                      </span>
                          <input type="text" class="form-control" id="Itelefono" value="<?php     echo $Itelefono;     ?>" name="Itelefono">
                      </div>

                      <div class="input-group form-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-user"></i>
                        </span>
                          <input type="text" class="form-control" id="Imail" value="<?php     echo $Imail;     ?>" name="Imail">
                      </div>

                      <div class="input-group form-group">
                        <span class="input-group-addon ">
                          <a href="#" onclick="ver_pass();" ><i id=Ipassc class="  glyphicon glyphicon-eye-open"></i></a>
                        </span>
                        <input  class="form-control" placeholder="Contraseña" name="Ipass" id="Ipass" type="password" value="<?php     echo $Ipass;     ?>">
                      </div>
      </div>
    </div>
  </div>
  <div class="panel panel-info">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>   <?php echo $leng[16][$_SESSION['leng']]; ?>
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
                    <div class="checkbox">
                      <label>
                      <input type="checkbox" name='Iact'  value='TRAB'
                          onclick="$('#collapseTRAB').collapse('toggle');activar('Iemp');activar('Iacts');"
                          <?php   if ($Iact=='TRAB') {echo "Checked";};     ?>>
                           <?php echo $leng[18][$_SESSION['leng']]; ?>
                      </label>


                      <div class="collapse <?php if ($Iact=='TRAB'){ echo "in";} ?>" id="collapseTRAB">
                        <div class="well">
                                    <div class="input-group">
                                      <span class="input-group-addon"><?php echo $leng[19][$_SESSION['leng']]; ?></span>
                                      <input  type="text" class="form-control" id="Iemp" <?php if ($Iact!='TRAB') {echo 'disabled';};?> value="<?php     echo $Iemp;     ?>" name="Iemp" >
                                    </div>

                                    <div class="checkbox">
                                      <label>
                                        <input type="checkbox" name='Iacts' id='Iacts' <?php if ($Iact!='TRAB') {echo 'disabled';};?>  value='SI' <?php   if ($Iacts=='SI') {echo "Checked";};     ?> > <?php echo $leng[21][$_SESSION['leng']]; ?>


                                      </label>
                                    </div>
                        </div>
                      </div>


                    </div>



                    <div class="checkbox">
                      <label>
                      <input type="checkbox" name='Idact' id='Idact' value='DTRAB' <?php   if ($Idact=='DTRAB') {echo "Checked";};     ?> > <?php echo $leng[22][$_SESSION['leng']]; ?>
                      </label>
                    </div>
      </div>
    </div>
  </div>
  <div class="panel panel-info">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>   <?php echo $leng[17][$_SESSION['leng']]; ?>
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name='Iest'  value='ESTU' <?php   if ($Iest=='ESTU') {echo "Checked";};     ?> > <?php echo $leng[23][$_SESSION['leng']]; ?>
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name='Idest'  value='DESTU' <?php   if ($Idest=='DESTU') {echo "Checked";};     ?> > <?php echo $leng[24][$_SESSION['leng']]; ?>
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
              <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                <strong><?php echo $leng[25][$_SESSION['leng']]; ?></strong> <?php     echo date('d-m-Y',strtotime($Itime));     ?>
                <p><?php echo $leng[26][$_SESSION['leng']]; ?></p>
               </div>

                  <textarea id="Icurri" name="Icurri">
                <?php     echo $Icurri;     ?>
                  </textarea>
      </div>
    </div>
  </div>




</div>



</form>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>


<!-- DPF
<?php
$apdf='<h2>CURRICULUM VITAE</h2>';
$apdf=$apdf.$Idni.'<br>'.$Inombrea.'<br>'.$Imail.'<br>'.$Itelefono.'<br><br><br>'.$Icurri;

 ?>


<br>
  <form action="../includes/mpdf.php" method="post" >
    <input type="hidden" class="form-control" id="pdf" value="<?php     echo $apdf;     ?>" name="pdf">
    <button type="submit" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> PDF en pruebas</button>
  </form>
-->

</div>
  </body>
</html>

<?php mysqli_close( $conexion ); ?>
