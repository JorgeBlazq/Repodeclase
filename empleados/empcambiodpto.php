<!DOCTYPE html>
<html>
<head>
	<title>Cambio Departamento</title>
</head>
<body>

	
		<?php
		
		$servername='localhost';
		$username='root';
		$password='rootroot';

if (!isset($_POST) || empty($_POST)) { 
	echo '<form action="" method="post"><label for="dni">Dni:</label><select name="dni">';
		try {
		$conn = new PDO("mysql:host=$servername;dbname=empleadosnn",
		$username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		
		$sql='select dni from empleado';//Select de dnis y mostramos en lista desplegable
 		foreach ($conn->query($sql) as $row) {
 			echo "<option value=".$row['dni'].">".$row['dni']."</option>";	
 		}
		}
		catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
		}
		?>
	</select>
	</br>
	<label for="dpto">Departamento:</label>
	<select name="dpto">
		<?php
		$servername='localhost';
		$username='root';
		$password='rootroot';


		try {
		$conn = new PDO("mysql:host=$servername;dbname=empleadosnn",
		$username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$sql='select cod_dpto, nombre_dpto from departamento'; //Select de codigos de departamento y mostramos en lista desplegable
 		foreach ($conn->query($sql) as $row) {
 			echo "<option value=".$row['cod_dpto'].">".$row['nombre_dpto']."</option>";	
 		}
		}
		catch(PDOException $e)
		{
		echo "Connection failed: " . $e->getMessage();
		}





	
		?>
	</select>
	</br>
	</br>
	<?php
	echo '<input type="submit" value="enviar"></form>';
} else {
			
	$servername='localhost';
	$username='root';
	$password='rootroot';


	try {
	$conn = new PDO("mysql:host=$servername;dbname=empleadosnn",
	$username, $password);
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	echo "Conexion Realizada";
	$stmt=$conn->prepare("UPDATE emple_depart SET fecha_fin = :fecha_fin WHERE dni = :dni"); /*
	Soy tonto hay que hacer un update de la fecha fin y insertar un nuevo registro a ver si lo hago mañana

	*/
	//Premaramos el update para cambiar el departamento del empleado seleccionado
	$stmt->bindparam(':dni',$dni);
	$stmt->bindparam(':fecha_fin', date('Y-m-d'));

	$dni=$_POST['dni'];
	$cod_dpto=$_POST['dpto'];
	$stmt->execute();

	$stmt=$conn->prepare("INSERT INTO emple_depart (dni, cod_dpto, fecha_ini) VALUES ( :dni, :cod_dpto, :fecha_ini)");
	$stmt->bindparam(':dni',$dni);
	$stmt->bindparam(':cod_dpto',$cod_dpto);//vinculamos parametros a variables
	$stmt->bindparam(':fecha_ini',date('Y-m-d'));

	echo "</br>Registro añadido";
	}
	catch(PDOException $e)
	{
	echo "Connection failed: " . $e->getMessage();
	}
}
	?>




</body>
</html>