<?php
session_start();
if($_SESSION['logueado']=='1'){
	if(isset($_POST['Pregunta'])){
	try{	
	$Correo=$_SESSION['correo'];
	$Pregunta=$_POST['Pregunta'];
	$Complejidad=$_POST['Valoracion'];
	$Respuesta=$_POST['Respuesta'];
	$Tematica=$_POST['Tematica'];
	
	$usu=mysqli_connect("mysql.hostinger.es", "u674157267_danel", "H8mu!AvUgmx!","u674157267_quiz");
	if(!$usu){
		throw new Exception($error);
	}
	$buscarPregunta = "SELECT * FROM preguntas WHERE  Pregunta=$Pregunta "; 
	$result = mysqli_query($usu,$buscarPregunta); 
	$count = mysql_num_rows($result); 
	if($count>0){
		echo '<script type="text/javascript"> 
	alert("Pregunta existente en la base de datos");
	</script>';
	}else{
		$tabla="SELECT * FROM Quiz";
		$tabla2=mysqli_query($usu,$tabla);
		if(!$tabla2){throw new Exception($error);}
		$Numero = mysql_num_rows($tabla2);
		$Numero=$Numero +1;
		$SQL1=" INSERT INTO preguntas VALUES('$Numero', '$Pregunta','$Respuesta','$Complejidad','$Correo')";
		if (!mysqli_query($usu,$SQL1))
		{
		throw new Exception($error);
		}
		}
		$_SESSION["logueado"]=0;
		mysql_close($usu);
		$xml = simplexml_load_file('preguntas.xml');
		$assessmentItem=$xml->addChild('assessmentItem');
		$itemBody=$assessmentItem->addChild('itemBody');
		$p=$itemBody->addChild('p',$_POST['Pregunta']);
		
		$correctResponse=$assessmentItem->addChild('correctResponse'); 
		$value=$correctResponse->addChild('value',$_POST['Respuesta']); 
		$assessmentItem->addAttribute('complexity',$_POST['Valoracion']);
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
		<script language = "javascript">
		
		function pedirDatos(){
xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function()
		{
			if(xmlhttp.readyState==4){
				document.getElementById("insertar").innerHTML=xmlhttp.responseText;
			}
		}
			xmlhttp.open("GET","baseDeDatos.php",true);
			xmlhttp.send('null');
		}
function insertarPregunta(){
xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function()
		{
			if(xmlhttp.readyState==4){
				document.getElementById("resultado").innerHTML=xmlhttp.responseText;
			}
		}
			xmlhttp.open("POST","insertarPregunta.php",true);
			xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); 
			var radios = document.getElementsByName('Valoracion');
			var pppp=radios[0];
			for(var i=0;i<radios.length;i++){
				if(radios[i].checked){
var selec=radios[i].value;
					 break;
				}
			}
			xmlhttp.send('&Pregunta='+document.getElementById('Correo').value + '&Respuesta='+document.getElementById('pass').value + '&Tematica='+document.getElementById('p').value + '&Valoracion='+selec);
		}
		
		</script>
		</head>
		<body>
<div id='resultado'></div>
		<form action="InsertarPregunta.php" method="post" id='formulario'>
			<div id='login'>
				<p><input type='button' id='ajax' onClick='pedirDatos()' value='VisualizarComentarios'></p>
				
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
				<p id='p3'><input type='button' id='boton' value='Insertar' onClick="insertarPregunta()"></p>

			</div>
		</form>
<p></p>
<p></p>

<div id='insertar'></div>
</body>
</html>

	<?php	
	}
}else{
	
	header("Location:login.php");
}
?>