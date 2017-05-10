

	<?php

  require"imagen.php";

$endfile="";
if(isset($_FILES['upload']['name'])){

  $sourcefile= $_FILES['upload']['tmp_name'];
  $endfile= $_FILES['upload']['name'];
  $type=$_FILES['upload']['type'];


//  echo $type'<br>';

  makeThumbnail($sourcefile, $max_width=100, $max_height=100, $endfile, $type);

  //Insert into database the file name
  //$query="insert into table values('$endfile')";
}


//makeThumbnail('foto.png', $max_width=100, $max_height=100, 'foto2.png', 'png');

	?>



	<form style="width:500px;margin:auto;" action="<?php echo $_SERVER["SCRIPT_NAME"];?>" enctype="multipart/form-data" method="post">
			<label>Select Image </label><br/><br/>
			<input type="file" name="upload" style="width:300px;padding:5px;border:1px solid #e0e0e0;"/><br/>
			<br/><input type="submit" value="upload"/>
	</form>
		</br><div style="width:500px;margin:auto;">
			<?php
				echo "Resized image<br/><br/><img src=".$endfile."";

			?>
