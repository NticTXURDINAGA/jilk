<?php session_start();
if ($_SESSION['JILKquien']!='yes') {header("Location: ../index.php");}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<?php
include '../includes/head.php';
include '../includes/conex.php';
if ($_POST['Kque']=='modi') {
  $consulta="UPDATE `kurso` SET `Kurso` = '".$_POST['Kurso']."',`Kcod` = '".$_POST['nKcod']."' WHERE `kurso`.`Kcod` = '".$_POST['Kcod']."'";
//echo $consulta;
  $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos DE ENTRADA");
}
if ($_POST['Kque']=='borra') {
  //$consulta="UPDATE `kurso` SET `Kurso` = '".$_POST['Kurso']."' WHERE `kurso`.`Kcod` = '".$_POST['Kcod']."'";
  $consulta="DELETE FROM `kurso` WHERE `kurso`.`Kcod` = '".$_POST['Kcod']."'";
  $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos DE ENTRADA");
}
?>
</head>
<body>

<?php include '../includes/menu.php'; ?>
<div class="container theme-showcase" role="main">


  <h3><span class="glyphicon glyphicon-print" aria-hidden="true"> </span> IMPRESO Fecha: <?php echo date("d-m-Y H:i:s");  ?></h3>
    <h3><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Estadísticas </h3>
      <form class="form-inline" action="#" method="post">
          <input type="text" class="form-control" name ="find" id="find" value='<?php echo $_POST['find']; ?>'>
          <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> </button>
      </form>

<br>
<!--
<p class="text-danger"> Si la palabra que buscamos es encontrada en más del 50% de registros , será tenida como nula.</p>
<p class="text-danger">  Existe una longitud mínima para las palabras a buscar, por defecto es de 03 caracteres.</p>
<br>
<p class="text-info"> <strong>+</strong> Indica que la palabra que precede "Tiene Necesariamente" que estar presente.</p>
<p class="text-info">  <strong>-</strong> La palabra precedida por este operador "No Debe" de estar presente.</p>
<p class="text-info">    <strong>*</strong> Comodín para 1 o más caracteres, a diferencia de los demás operadores deberá ser añadido al final de la palabra y no antes.</p>
<p class="text-info">   <strong>""</strong> Las palabras o frases entre comillas serán buscadas literalmente en los registros.</p>
-->
       <table class="table table-striped">
                     <thead>
                       <tr>
                         <th>CODIGO</th>
                         <th>KURSO</th>


                       </tr>
                     </thead>
                     <tbody>
              <!--      <div class="alert alert-success" role="alert">       <strong>BUSQUEDA:</strong> <?php echo $_POST['find'] ?>      </div> -->
 <?php
//VARIABLES TOTALES INICIAR
$ScItotal=0;
$ScIact=0;
$ScIacts=0;
$ScIdact=0;
$ScIest=0;
$ScIdest=0;
$ScIdual=0;
//VARIABLES TOTALES INICIAR
                    // echo $_POST['find'];
                      $consulta = "select * from kurso  WHERE MATCH (Kcod,Kurso) AGAINST ('".$_POST['find']."' IN BOOLEAN MODE)";
                  //    echo $consulta;
                      $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos DE ENTRADA");
                       while ($columna = mysqli_fetch_array( $resultado )) {
                       $Kcod=$columna['Kcod'];
                       $Kurso=$columna['Kurso'];
                       $KursoM=str_replace('Fami','<b class="text-danger">Fami</b>',$Kurso);
                       $KursoM=str_replace('Grad','<b class="text-danger">Grad</b>',$KursoM);



                       //CONTAR ALUMNO
                      $nalumnos='SELECT count(Idni) as numero FROM `ik` WHERE `Kcod`="'.$Kcod.'"';
                      //echo $nalumnos;
                      $resultadoA = mysqli_query( $conexion, $nalumnos ) or die ( "Algo ha ido mal en la consulta a la base de datos DE ENTRADA");
                      while ($colum = mysqli_fetch_array( $resultadoA )) { $Nalumnos=$colum['numero'];        }

                      //CONTAR ALUMNOS
?>

<tr>

  <td><?php echo $Kcod; ?></td>

  <td ><?php echo $KursoM; ?>

  <a  role="button" data-toggle="collapse" href="#collapse3<?php echo $Kcod; ?>" aria-expanded="false" aria-controls="collapseExample">
    <span class="badge"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $Nalumnos; ?></span></a>
  <a  role="button" data-toggle="collapse" href="#collapse<?php echo $Kcod; ?>" aria-expanded="false" aria-controls="collapseExample">
    <span class="badge"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></span></a>
  <a  role="button" data-toggle="collapse" href="#collapse2<?php echo $Kcod; ?>" aria-expanded="false" aria-controls="collapseExample">
    <span class="badge"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span></a>


   <div class="collapse" id="collapse<?php echo $Kcod; ?>">
   <div class="well well-sm">

      <form  action="#" method="post">
          <input type="hidden" class="form-control" value='modi' name ="Kque" id="Kque">
          <input type="hidden" class="form-control" value='<?php echo $Kcod; ?>' name ="Kcod" id="Kcod">
          <input type="hidden" class="form-control" value='<?php echo $_POST['find']; ?>' name ="find" id="find">


          <div class="form-group">  <input type="hidden"  class="form-control" value='<?php echo $Kcod; ?>' name ="nKcod" id="nKcod"></div>
          <div class="form-group">  <input type="text"  class="form-control" value='<?php echo $Kurso; ?>' name ="Kurso" id="Kurso"></div>

          <div class="form-group"><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ModalM<?php echo $Kcod; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></div>


                      <!-- Modal -->
                      <div class="modal fade" id="ModalM<?php echo $Kcod; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="myModalLabel">JILK TXURDINAGA</h4>
                            </div>
                            <div class="modal-body">
                                <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> MODIFICAR <?php echo $Kcod; ?></h4>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                              <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
                            </div>
                          </div>
                        </div>
                      </div>

      </form>
   </div>
   </div>


   <div class="collapse" id="collapse2<?php echo $Kcod; ?>">
     <div class="well well-sm">

       <div class="alert alert-danger alert-dismissible" role="alert">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             <strong><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> BORRAR CURSO</strong>
       </div>

        <form  action="#" method="post">
            <input type="hidden" class="form-control" value='borra' name ="Kque" id="Kque">
            <input type="hidden" class="form-control" value='<?php echo $Kcod; ?>' name ="Kcod" id="Kcod">
            <input type="hidden" class="form-control" value='<?php echo $_POST['find']; ?>' name ="find" id="find">

             <div class="form-group"><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ModalB<?php echo $Kcod; ?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></div>



             <!-- Modal -->
             <div class="modal fade" id="ModalB<?php echo $Kcod; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
               <div class="modal-dialog" role="document">
                 <div class="modal-content">
                   <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title" id="myModalLabel">JILK TXURDINAGA</h4>
                     <div class="alert alert-danger alert-dismissible" role="alert">
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                           <strong>NO TIENE SENTIDO BORRAR UNA VEZ HAYA ALUMNOS MATRICULADOS - FALTA VIGILAR SI HAY ALUMNOS MATRICULADOS !!!!!!!!!!!!!</strong>
                     </div>
                   </div>
                   <div class="modal-body">
                       <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> ELIMINAR <?php echo $Kcod; ?></h4>
                   </div>
                   <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                     <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
                   </div>
                 </div>
               </div>
             </div>

        </form>
     </div>
   </div>

   <div class="collapse" id="collapse3<?php echo $Kcod; ?>">
     <?php
     //INICIAMOS VARIABLES
      $cItotal=0;
      $cIact=0;
      $cIacts=0;
      $cIdact=0;
      $cIest=0;
      $cIdest=0;
      $cIdual=0;
      ?>
     <div class="well well-sm">

         <table class="table table-condensed table-bordered" >
                       <thead>
                         <tr class="info text-center">
                           <small>
                          <th class="text-center">DNI</th>
                          <th class="text-center">NOMBRE</th>
                          <th class="text-center">E-mail</th>
                          <th class="text-center">Tel.</th>
                          <th class="text-center">DU</th>
                          <th class="text-center">TR</th>
                          <th class="text-center">TS</th>
                          <th class="text-center">DT</th>
                          <th class="text-center">ES</th>
                          <th class="text-center">DE</th>
                          <th class="text-center">AC</th>
                        </small>
                         </tr>
                       </thead>
                       <tbody>
                             <?php
                             $consulta2="SELECT * FROM ik,ikasle WHERE ik.Idni=ikasle.Idni AND ik.Kcod='".$Kcod."' ORDER BY `ikasle`.`Inombrea` ASC";
                             //echo $consulta2;
                             $resultado2 = mysqli_query( $conexion, $consulta2 ) or die ( "Algo ha ido mal en la BUSQUEDA DE ALUMNOS");
                             while ($columna2 = mysqli_fetch_array( $resultado2 )) {
                            $cItotal++;
                             $Idni=$columna2['Idni'];
                             $Inombrea=$columna2['Inombrea'];
                             $Imail=$columna2['Imail'];
                             $Icurri=$columna2['Icurri'];
                             $IKdual=$columna2['IKdual'];
                             $Itime=$columna2['Itime'];
                             $Itelefono=$columna2['Itelefono'];
                             $Iact=$columna2['Iact'];
                             $Idact=$columna2['Idact'];
                             $Iacts=$columna2['Iacts'];
                             $Iest=$columna2['Iest'];
                             $Idest=$columna2['Idest'];
                             ?>
                             <tr>
                               <td><small>
                                 <?php if (strlen($Icurri)>0) { ?>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal<?php echo $Idni; ?>">
                                      <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal<?php echo $Idni; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                      <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">CURRICULUM: <?php echo $Inombrea;  ?></h4>
                                          </div>
                                          <div class="modal-body">
                                            <?php echo htmlspecialchars_decode($Icurri); ?>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                 <?php
                               }
                                echo $Idni; ?>
                                </small>
                               </td>
                               <td><small><?php echo $Inombrea; ?></small></td>
                               <td><small><?php echo $Imail; ?></small></td>
                               <td><small><?php echo $Itelefono; ?></small></td>
                               <td class="text-center"><small><?php if ($IKdual=='DUAL') {$cIdual++; echo 'X';}  ?></small></td>

                               <td class="text-center"><small><?php if ($Iact=='TRAB') {$cIact++; echo 'X';}  ?></small></td>
                               <td class="text-center"><small><?php if ($Iacts=='SI') {$cIacts++; echo 'X';} ?></small></td>
                               <td class="text-center"><small><?php if ($Idact=='DTRAB') {$cIdact++; echo 'X';} ?></small></td>
                               <td class="text-center"><small><?php if ($Iest=='ESTU') {$cIest++; echo 'X';} ?></small></td>
                               <td class="text-center"><small><?php if ($Idest=='DESTU') {$cIdest++; echo 'X';} ?></small></td>


                               <td class="text-center"><small><?php
                                          if (date('d-m-Y',strtotime($Itime))=='01-01-1970') {echo 'NUNCA';} else {echo date('d-m-Y',strtotime($Itime));};
                                          ?>
                                    </small></td>

                              </tr>
                             <?php
                           } //alumnos de cada curl_multi_setopt
                           //VARIABLES TOTALES
                           $ScItotal=$ScItotal+$cItotal;
                           $ScIact=$ScIact+$cIact;
                           $ScIacts=$ScIacts+$cIacts;
                           $ScIdact=$ScIdact+$cIdact;
                           $ScIest=$ScIest+$cIest;
                           $ScIdest=$ScIdest+$cIdest;
                           $ScIdual=$ScIdual+$cIdual;
                           //VARIABLES TOTALES
                             ?>
                             <tr class="info text-center" ><td></td><td></td><td></td>

                               <td >
                                <span class="badge"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $cItotal; ?></span>
                               </td>
                               <td><small><?php echo $cIdual; ?></small></td>
                               <td><small><?php echo $cIact; ?></small></td>
                               <td><small><?php echo $cIacts; ?></small></td>
                               <td><small><?php echo $cIdact; ?></small></td>
                               <td><small><?php echo $cIest; ?></small></td>
                               <td><small><?php echo $cIdest; ?></small></td>
                            <td></td></tr>
                            <tr class="danger text-center"><td></td><td></td><td></td>

                              <td>
                                <span class="badge"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 100%</span>

                              </td>
                              <td><small><?php echo round($cIdual*100/$cItotal,2).'%'; ?></small></td>
                              <td><small><?php echo round($cIact*100/$cItotal,2).'%'; ?></small></td>
                              <td><small><?php echo round($cIacts*100/$cItotal,2).'%'; ?></small></td>
                              <td><small><?php echo round($cIdact*100/$cItotal,2).'%'; ?></small></td>
                              <td><small><?php echo round($cIest*100/$cItotal,2).'%'; ?></small></td>
                              <td><small><?php echo round($cIdest*100/$cItotal,2).'%'; ?></small></td>
                           <td></td></tr>
                       </tbody>
          </table>
     </div>
   </div>


 </td>
</tr>

 <?php
   } //de cada curso
   ?>
 </tbody>
 </table>


<?php
//PRUEBA DE INFORM DE TOTALES //PRUEBA DE INFORM DE TOTALES //PRUEBA DE INFORM DE TOTALES //PRUEBA DE INFORM DE TOTALES
$sal=' <table class="table table-condensed table-bordered">
   <thead>
     <tr class="info text-center">
       <small>
      <th class="text-center">TOTALES</th>
      <th class="text-center">DU</th>
      <th class="text-center">TR</th>
      <th class="text-center">TS</th>
      <th class="text-center">DT</th>
      <th class="text-center">ES</th>
      <th class="text-center">DE</th>
    </small>
     </tr>
   </thead>
 <tr class="text-center">
   <td >
    <span class="badge"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> '.$ScItotal.'</span>
   </td>
   <td><small>'. $ScIdual .'</small></td>
   <td><small>'. $ScIact .'</small></td>
   <td><small>'. $ScIacts .'</small></td>
   <td><small>'. $ScIdact.' </small></td>
   <td><small>'. $ScIest.' </small></td>
   <td><small>'. $ScIdest .'</small></td>
</tr>
<tr class="danger text-center">
     <td >
      <span class="badge"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 100%</span>
    </td>
  <td><small>'. round($ScIdual*100/$ScItotal,2).'% </small></td>
  <td><small>'. round($ScIact*100/$ScItotal,2).'% </small></td>
  <td><small>'. round($ScIacts*100/$ScItotal,2).'% </small></td>
  <td><small>'.round($ScIdact*100/$ScItotal,2).'% </small></td>
  <td><small>'. round($ScIest*100/$ScItotal,2).'% </small></td>
  <td><small>'. round($ScIdest*100/$ScItotal,2).'% </small></td>
</tr>
</table>';

if ($ScItotal!=0) {echo $sal;}
//PRUEBA DE INFORM DE TOTALES //PRUEBA DE INFORM DE TOTALES //PRUEBA DE INFORM DE TOTALES
 ?>
 <!--
 <form action="../includes/mpdf.php" method="post" >
   <input type="hidden" class="form-control" id="pdf" value="<?php     echo htmlspecialchars($sal);     ?>" name="pdf">
   <button type="submit" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> PDF</button>
 </form>

 -->



</div>
</body>
<?php include '../includes/pie.php'; ?>
