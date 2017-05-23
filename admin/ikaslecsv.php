<?php session_start();
if ($_SESSION['JILKquien']!='yes') {header("Location: ../index.php");}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<?php
include '../includes/head.php';
include '../includes/conex.php';
include "../includes/newmailadmin.php";
?>
</head>
<body>

<?php include '../includes/menu.php'; ?>
<div class="container-fluid" role="main">
<!-- <div class="container theme-showcase" role="main"> -->


      <h3>no muestra</h3>
      <h3>CARGA IKASLE CSV</h3>

      <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>FALTA CONTROLAR FORMATO DE ARCHIVO !!!!! </strong>
          </div>

  <p><a href='../tmp/ikasleak.csv'> Modelo de Ikasleak CSV </a></p>

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
            move_uploaded_file($_FILES['newcsv']['tmp_name'], "../tmp/newIcsv.csv");

$CerrorA="";
$CerrorC="";
// MOSTRAR CONRTENIDO CSV

            $NOlinea=0;
            $fila = 1;
            if (($gestor = fopen("../tmp/newIcsv.csv", "r")) !== FALSE) {
                while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {

                    //EVITAR LINEA 1
                    if ($NOlinea==1)
                    {
                    //$numero = count($datos); //para controlar que estan los 4 datos

//CREAR ALUMNOS:
// INSERT INTO `ikasle` (`Idni`, `Inombrea`, `Imail`, `Itelefono`, `Iact`, `Iest`, `Idact`, `Idest`, `Iacts`, `Iemp`, `Itime`, `Itipo`, `Icurri`)
///VALUES ('1234567', 'nombre', 'mail', '876767656', 'a', 'a', 'a', 'a', 'SI', 'empresa tra', NULL, NULL, NULL);
if (!empty($datos[5])) {$datos[5]='TRAB';}
if (!empty($datos[9])) {$datos[9]='ESTU';}
if (!empty($datos[8])) {$datos[8]='DTRAB';}
if (!empty($datos[10])) {$datos[10]='DESTU';}
if (!empty($datos[7])) {$datos[7]='X';}
if (!empty($datos[13])) {$datos[13]='X';}
if (!empty($datos[11])) {$datos[11]='DUAL';}


$cikasle="INSERT INTO `ikasle` (`Ipass`,`Idni`, `Inombrea`, `Imail`, `Itelefono`, `Iact`, `Iest`, `Idact`, `Idest`, `Iacts`, `Iemp`, `Itime`, `Itipo`, `Icurri`)
VALUES ('".$datos[1]."','".$datos[1]."','".$datos[2]."','".$datos[3]."','".$datos[4]."','".$datos[5]."','".$datos[9]."','".$datos[8]."','".$datos[10]."','".$datos[7]."','".$datos[6]."', NULL, NULL, NULL)";
//echo $cikasle."<br>";
if (!mysqli_query($conexion,$cikasle)) { $CerrorA=$CerrorA.' ERROR ALUMNO: '.$datos[1].' '.$datos[2].'<br>';    }
else
{
//GENERAR LISTA CORREOS
//  $destinos[]=$_POST['JILKcorreor'];
$destinos[]=$datos[3];   //cada vez que no da error ....
}

//VINCULAR CURSO
//INSERT INTO `ik` (`Kcod`, `Idni`, `IKempfct`, `IKcont`, `IKdual`) VALUES ('curso', 'dni', 'empresa fct', 'SI', 'DUAL');
$cik="INSERT INTO `ik` (`Kcod`, `Idni`, `IKempfct`, `IKcont`, `IKdual`)
VALUES ('".$datos[0]."', '".$datos[1]."', '".$datos[12]."', '".$datos[13]."', '".$datos[11]."')";
//echo $cik."<br>";
if (!mysqli_query($conexion,$cik)) { $CerrorC=$CerrorC.' ERROR RELACION: '.$datos[1].' '.$datos[2].' CON CURSO: '.$datos[0].'<br>';    }

                  $fila++;
                  }
                  $NOlinea=1;
                }
                fclose($gestor);
            }
           unlink('../tmp/newIcsv.csv');

           if ($CerrorA!="") {
                                ?>
                                          <div class="alert alert-danger alert-dismissible" role="alert">
                                                   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                   <p><strong><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                                                   ARCHIVO PROCESADO CON INCIDENCIAS, ALUMNOS: </strong></p>
                                                   <p> Posiblemente YA dados de alta.</p>
                                                   <?php echo $CerrorA; ?>
                                          </div>
                                <?php
                                }

           if ($CerrorC!="") {
                                ?>
                                        <div class="alert alert-warning alert-dismissible" role="alert">
                                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                 <p><strong><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                                                 ARCHIVO PROCESADO CON INCIDENCIAS, CURSOS: </strong></p>
                                                 <p>Alumnos ya matriculados en ese Curso.</p>
                                                  <?php echo $CerrorC; ?>
                                        </div>
                                <?php
                                  }
  }

  //ENVIAR CORREOS si $CorreosOK='OK'
  echo count($destinos).'<br>';
  foreach ($destinos as &$destino) {  echo $destino.'<br>'; }
  if (count($destinos)>0)
  {
    //ENVIA CORREOS
    //count($destinos)
    //$destinos[]=$_POST['JILKcorreor'];
    //$destinos[]='ntic@fptxurdinaga.com';
    $Asunto='DADO DE ALTA JILK';
    $Cuerpo='<h1>Hola NUEVO Usuario del JILK.</h1>
              <p>Tu CLAVE es tu DNI</p>
              <p>Un saludo.</p>';
    nuevomail($Asunto,$destinos,$Cuerpo);
  }
?>



</div>
</body>
<?php include '../includes/pie.php'; ?>
