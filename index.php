<?php session_start(); ?>

<?php
include './includes/conex.php';

if (strlen($_POST['JILKcorreo'])>0)
{
  if (($_POST['JILKcorreo']=='admin@fptxurdinaga.com') AND ($_POST['JILKdni']=='admin'))
  {
      $_SESSION['JILKquien']='yes';
      header('Location: ./admin/index.php');
  }
  else
  {
      $consulta = 'SELECT Idni from ikasle where Imail="'.$_POST['JILKcorreo'].'" AND Idni="'.$_POST['JILKdni'].'"';
      echo $consulta;
      $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos DE COMPROBACION DE ALUMNO");
      // echo "PROBANDO ",$consulta;  //COMPROBACIONES !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!1111
      while ($columna = mysqli_fetch_array( $resultado )) { $Idni=$columna['Idni'];}

      // iniciar session 1 vez
      if ($Idni>0){  $_SESSION['Idni'] = $Idni;  }
      header('Location: ./ikasle/index.php');

  }
}
?>

  <!DOCTYPE html>
  <html lang="es">
  <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <title>JILK - CIFP TXURDINAGA LHII</title>
     <!-- Bootstrap -->
     <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="./css/estilos.css" media="screen" />

  </head>

  <body>
      <!-- conexion BD -->
      <div class="container" style="margin-top:40px">
      		<div class="row">
      			<div class="col-sm-6 col-md-4 col-md-offset-4">
      				<div class="panel panel-default">
      					<div class="panel-heading">
      						<strong>JILK: CIFP TXURDINGA LHII</strong>
      					</div>
      					<div class="panel-body">
      						<form role="form" action="#" method="POST">
      							<fieldset>
      								<div class="row">
      									<div class="center-block">
      								<!--		<img class="profile-img"
      											src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120" alt=""> -->
                            <img class="profile-img" src="./imagenes/logoTX.png" alt="">
      									</div>
      								</div>
      								<div class="row">
      									<div class="col-sm-12 col-md-10  col-md-offset-1 ">
      										<div class="form-group">
      											<div class="input-group">
      												<span class="input-group-addon">
      													<i class="glyphicon glyphicon-user"></i>
      												</span>
      												<input class="form-control" placeholder="Correo electrónico" name="JILKcorreo" type="email" autofocus>
      											</div>
      										</div>
      										<div class="form-group">
      											<div class="input-group">
      												<span class="input-group-addon">
      													<i class="glyphicon glyphicon-lock"></i>
      												</span>
      												<input class="form-control" placeholder="Contraseña" name="JILKdni" type="password" value="">
      											</div>
      										</div>
      										<div class="form-group">
      											<input type="submit" class="btn btn-lg btn-primary btn-block" value="Entrar">
      										</div>
      									</div>
      								</div>
      							</fieldset>
      						</form>
      					</div>
      					<div class="panel-footer ">
      						Recordar contraseña PENDIENTE <a href="#" onClick=""> o NO !! </a>
      					</div>
                      </div>
      			</div>
      		</div>
      	</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="./bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>

<?php // mysqli_close( $conexion ); ?>
