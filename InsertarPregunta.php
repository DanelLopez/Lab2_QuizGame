<!DOCTYPE html>
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
      		<span class="right"><a href="layout.html">Logout</a></span>

		<h2>Quiz: el juego de las preguntas</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layoutU.html'>Inicio</a></spam>
		<span><a href='InsertarPregunta.php'> Insertar Pregunta</a></spam>
		<span><a href='creditosU.html'>Creditos</a></spam>
	</nav>
    <section class="main" id="s1">
    
	<div>
	
<html>
<body>
<form action="InsertarPregunta.php?email=<?php echo $_GET['email']?>" method="get">
<h2>Añadir una pregunta </h2>
<p> Pregunta: <input type="text" id="pregunta" name="pregunta" />
<p> Respuesta: <input type="text" id="respuesta" name="respuesta" />
<p> Complejidad : <input type="number" id="complejidad" name="complejidad" />
<p> <input type="hidden" name="email" value="<?php echo $_GET['email']?>"/>
<p> <input type="hidden" name="correo" value="<?php echo $_GET['correo']?>"/>
<p> <input id="anadir" type="submit" onclick="anadirCorreo()"/>
</form>
<?php

if(isset($_GET['pregunta'])){
	
	$link = mysqli_connect("localhost","root","","quiz") or die(mysql_error());

	
	if(empty($pregunta) || empty($respuesta)){
		die("Error: Introduzca datos");
	}
	
	$sql = "INSERT INTO pregunta(Pregunta, Respuesta, Complejidad, Autor) VALUES ('$_GET[pregunta]','$_GET[respuesta]','$_GET[complejidad]','$_GET[email]')";
	if(!mysqli_query($link, $sql)){
		die("Error:".mysqli_error($link));
	}
	echo "Pregunta añadida";
	mysqli_close($link);
}
?>
</body>
</html>

	</div>
    </section>
	<footer class='main' id='f1'>
		<p><a href="http://es.wikipedia.org/wiki/Quiz" target="_blank">Que es un Quiz?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>

