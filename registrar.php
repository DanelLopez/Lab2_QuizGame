<?php  
  // Se conecta al SGBD 
  $iden = mysqli_connect("localhost", "root", "","quiz")or die("Error: No se pudo conectar");
  
	//sentencia a ejecutar
	$sql="INSERT INTO Usuario(nombre, apellidos, correo, contrasena, telefono, especialidad) VALUES ('$_POST[nombre]','$_POST[apellidos]','$_POST[email]','$_POST[pass]','$_POST[tlf]','$_POST[especialidad]')";
		if (!mysqli_query($iden ,$sql))
			{
			die('Error: ' . mysqli_error($iden));
			}

	echo "1 record added";
	echo "<p> <a href='verdatos.php'> Ver registros </a>";
	mysqli_close($iden);
	

?>; 
