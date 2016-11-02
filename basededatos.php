<?php
session_start();
$usu=mysqli_connect("mysql.hostinger.es", "u674157267_danel", "H8mu!AvUgmx!","u674157267_quiz");
$Correo=$_SESSION['correo'];
$consulta="SELECT * FROM preguntas WHERE Autor='$Correo'";
$result = mysqli_query($usu,$consulta);
echo '<TABLE BORDER=1 WIDTH=300>
			<TR>
			<TD WIDTH=100>
			Preguntas
			</TD>
			</TR>';
			while( $row = mysql_fetch_array( $result ) ) {
				echo '<TR>
				<TD WIDTH=100>'
					.$row['Pregunta'].
			'</TD>
				
			</TR>';
			
			
 }
echo '</TABLE>';
 mysqli_close($usu);
?>