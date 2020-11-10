<?php
 echo "<h1>Datos Alumnos</h1>";
 echo "<table style='border: 1px solid black;'><tr style='border: 1px solid black;'><td style='border: 1px solid black;'>Nombre</td><td style='border: 1px solid black;'>Apellidos<td style='border: 1px solid black;'>Email</td><td style='border: 1px solid black;'>Genero</td></tr><tr style='border: 1px solid black;'><td style='border: 1px solid black;'>".$_POST['nombre']."</td><td style='border: 1px solid black;'>".$_POST['ape1']." ".$_POST['ape2']."</td><td style='border: 1px solid black;'>".$_POST['email']."</td><td style='border: 1px solid black;'>".$_POST['genero']."</td></tr></table>";
if (($_POST['nombre']!="") && ($_POST['email']!="") && ($_POST['genero']!="")) {
	# code...

$f1=fopen("datos.txt","a");
fwrite($f1, $_POST['nombre']."###".$_POST['ape1']." ".$_POST['ape2']."###".strtolower($_POST['email'])."###".$_POST['genero']."\r\n");
}else//mandar un error
?>