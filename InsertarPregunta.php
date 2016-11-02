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
		<span><a href='layout.html'>Inicio</a></spam>
		<span><a href='InsertarPregunta.php'> Insertar Pregunta</a></spam>
		<span><a href='creditos.html'>Creditos</a></spam>
	</nav>
    <section class="main" id="s1">
    
	<div>
	
<html>
<body>
<?php
session_start();
if($_SESSION['logueado']=='1'){
	if(isset($_POST['Pregunta'])){
	try{	
	$Correo=$_SESSION['correo'];
	$Pregunta=$_POST['Pregunta'];
	$Respuesta=$_POST['Respuesta'];
	$Complejidad=$_POST['Complejidad'];

	
	$usu = mysqli_connect("mysql.hostinger.es", "u674157267_danel", "H8mu!AvUgmx!","u674157267_quiz") or die(mysqli_error());
	$buscarPregunta = "SELECT * FROM preguntas WHERE  Pregunta=$Pregunta "; 
	$result = mysqli_query($usu,$buscarPregunta); 
	$count = mysqli_num_rows($result); 
	if($count>0){
		echo '<script type="text/javascript"> 
	alert("Pregunta existente en la base de datos");
	</script>';
	}else{
		$tabla="SELECT * FROM preguntas";
		$tabla2=mysqli_query($usu,$tabla);
		if(!$tabla2){throw new Exception($error);}
		$Numero = mysqli_num_rows($tabla2);
		$Numero=$Numero +1;
		$SQL1=" INSERT INTO preguntas VALUES('$Numero','$Pregunta','$Respuesta','$Complejidad','$Correo')";
		if (!mysqli_query($usu,$SQL1))
		{
			if(!mysqli_query($usu, $SQL1)){
			die("Error:".mysqli_error($usu));
			}
		}			
		echo "Pregunta añadida";
		mysqli_close($usu);
		}
		
		$_SESSION["logueado"]=0;
		$xml = simplexml_load_file('preguntas.xml');
		$assessmentItem=$xml->addChild('assessmentItem');
		$itemBody=$assessmentItem->addChild('itemBody');
		$p=$itemBody->addChild('p',$_POST['Pregunta']);
		
		$correctResponse=$assessmentItem->addChild('correctResponse'); 
		$value=$correctResponse->addChild('value',$_POST['Respuesta']); 
		$assessmentItem->addAttribute('complexity',$_POST['Complejidad']);
		$assessmentItem->addAttribute('subject',$_POST['Tematica']);
		
		if (!$xml->asXML('preguntas.xml'))
		{
		throw new Exception($error);
		}
		echo '<script type="text/javascript"> 
	alert("Se ha introducido la pregunta en la base de datos");
	</script>';
	
	}catch(Exception $error){
		 echo '<script language="javascript">alert("Pregunta no introducida");</script>'; 
		 exit();
		
	}
		echo '<script language="javascript">alert("Pregunta introducida");</script>'; 
		sleep(2);
	header("Location:VisualizarXml.php");
	
		
		}else{
		?>
		
		<html>
		<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title> Insertar Pregunta </title>
		<link rel="STYLESHEET" type="text/css"
		href="estilo.css">
		</head>
		<body>

		<form action="InsertarPregunta.php" method="post" id='formulario'>
			<div id='login'> 
				<p id='titulo'> Quiz </p>
				<p id='p1'>Pregunta:<input type='text' id='Correo' name='Pregunta'></p>
				<p id='p2'>Respuesta: <input type='text' id='pass'name='Respuesta'></p>
				<p id='p4'>Complejidad: <input type='radio' id='1'name='Complejidad' value=1>1
									<input type='radio' id='2'name='Complejidad'value=2>2
									<input type='radio' id='3'name='Complejidad'value=3>3
									<input type='radio' id='4'name='Complejidad'value=4>4
									<input type='radio' id='5'name='Complejidad'value=5>5
				</p>
				<p id='p5'>Tematica: <input type='text' name='Tematica'></p>
				<p id='p3'><input type='submit' id='boton' value='Insertar'></p>
			</div>
		</form>

</body>
</html>

	<?php	
	}
}else{
	
	header("Location:login.php");
}
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

