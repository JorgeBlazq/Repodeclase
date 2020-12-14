<!DOCTYPE html>
<html>
<head>
	<title>Lista Departamento</title>
</head>
<body>

	
		<?php
		
		$servername='localhost';
		$username='root';
		$password='rootroot';

if (!isset($_POST) || empty($_POST)) { 
	echo '<form action="" method="post"><label for="dpto">Departamento:</label><select name="dpto">';
		try {
		$conn = new PDO("mysql:host=$servername;dbname=empleadosnn",
		$username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		
		$sql='select cod_dpto, nombre_dpto from departamento'; //Seleccionamos los departamentos y mostramos en lista desplegable.
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
	</br>
	<?php
	echo '<input type="submit" value="enviar"></form>';
} else {
			
	$servername='localhost';
	$username='root';
	$password='rootroot';

//mysql> select empleado.dni, empleado.nombre, empleado.apellidos, empleado.fecha_nac, empleado.salario from empleado inner join emple_depart on empleado.dni = emple_depart.dni where emple_depart.cod_dpto = 'd002';
	try {
	$conn = new PDO("mysql:host=$servername;dbname=empleadosnn",
	$username, $password);
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	echo "Conexion Realizada";
	$sql='select empleado.dni, empleado.nombre, empleado.apellidos, empleado.fecha_nac, empleado.salario as dni, nombre, apellidos, fecha_nac, salario from empleado inner join emple_depart on empleado.dni = emple_depart.dni where emple_depart.cod_dpto = "'.$_POST['dpto'].'";'; //Seleccionamos los departamentos y mostramos en lista desplegable.
	echo "<table style='border: 1px solid black;'>";
	echo "<tr style='border: 1px solid black;'><td style='border: 1px solid black;'>DNI</td><td style='border: 1px solid black;'>Nombre</td><td style='border: 1px solid black;'>Apellidos</td><td style='border: 1px solid black;'>Fecha nacimiento</td><td style='border: 1px solid black;'>Salario</td></tr>";
 		foreach ($conn->query($sql) as $row) {
 			echo "<tr style='border: 1px solid black;'><td style='border: 1px solid black;'>".$row['dni']."</td><td style='border: 1px solid black;'>".$row['nombre']."</td><td style='border: 1px solid black;'>".$row['apellidos']."</td><td style='border: 1px solid black;'>".$row['fecha_nac']."</td><td style='border: 1px solid black;'>".$row['salario']."</td></tr>";	
 		}
		}
		catch(PDOException $e)
		{
		echo "Connection failed: " . $e->getMessage();
		}
}
	?>




</body>
</html>