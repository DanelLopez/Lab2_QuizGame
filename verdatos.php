
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Preguntas</title>
    <link rel='stylesheet' type='text/css' href='estilos/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='estilos/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='estilos/smartphone.css' />
  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
		<span class="right"><a href="registro.html">Registrarse</a></span>
      		<span class="right"><a href="login.php">Login</a></span>
      		<span class="right" style="display:none;"><a href="/logout">Logout</a></span>
		<h2>Quiz: el juego de las preguntas</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.html'>Inicio</a></spam>
		<span><a href='quizes'>Preguntas</a></spam>
		<span><a href='creditos.html'>Creditos</a></spam>
	</nav>
    <section class="main" id="s1">
    
	<div>
	<?php
$link= mysqli_connect("localhost", "root", "", "quiz");
$usuarios = mysqli_query($link, "select * from Usuario" );
echo '<table border=1> <tr> <th> Nombre </th> <th> APELLIDOS </th> <th> CORREO </th> <th> CONTRASENA </th> <th> TELEFONO </th> <th> ESPECIALIDAD </th>
</tr>';
while ($row = mysqli_fetch_array( $usuarios )) {
echo '<tr><td>' . $row['Nombre'] . '</td> <td>' . $row['Apellidos'] . '</td> <td>' . $row['Correo'] . '</td> <td>' . $row['Contrasena'] . '</td> <td>' . $row['Telefono'] . '</td>  <td>' . $row['Especialidad'] . '</td>
</tr>';
}
echo '</table>';
$usuarios->close();
mysqli_close($link);
?>
	</div>
    </section>
	<footer class='main' id='f1'>
		<p><a href="http://es.wikipedia.org/wiki/Quiz" target="_blank">Que es un Quiz?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>