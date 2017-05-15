
<form  action="#" enctype="multipart/form-data" method="post">
		<input type="file" name="upload" style="width:300px;padding:5px;border:1px solid #e0e0e0;"/><br/>
		<input type="submit" value="upload"/>
</form>

	<?php

require "../includes/imagen.php";

if(isset($_FILES['upload']['name'])){

  $sourcefile= $_FILES['upload']['tmp_name'];
  $endfile= $_FILES['upload']['name'];
  $type=$_FILES['upload']['type'];

  makeThumbnail($sourcefile, $max_width=150, $max_height=150, $endfile, $type);

  //Insert into database the file name
  //$query="insert into table values('$endfile')";
	echo '<img src="'.$_FILES['upload']['name'].'" />';
}

	?>
