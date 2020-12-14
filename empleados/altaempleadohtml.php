<!DOCTYPE html>
<html>
<head>
	<title>Alta Empleado</title>
</head>
<body>
	
<form name="altaemp" action="altaempleado.php" method="post">
	<label for="dni">Dni:</label>
	<input type="text" name="dni">
	</br>
	<label for="nombre">Nombre:</label>
	<input type="text" name="nombre">
	</br>
	<label for="ape">Apellidos:</label>
	<input type="text" name="ape">
	</br>
	<label for="fecha">fecha:</label>
	<input type="text" name="fecha">
	</br>
	<label for="salario">Salario:</label>
	<input type="text" name="salario">
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
		$sql='select cod_dpto, nombre_dpto from departamento';
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
	
	<input type="submit" value="enviar">
	
</form>


</body>
</html>