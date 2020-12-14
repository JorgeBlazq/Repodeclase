<?php
//Este apartado esta en 2 archivos porque lo hice antes de que explicases como autollamarse dentro de un unico php 
$servername='localhost';
$username='root';
$password='rootroot';


try { 
$conn = new PDO("mysql:host=$servername;dbname=empleadosnn",
$username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
echo "Conexion Realizada";
$stmt=$conn->prepare("INSERT INTO empleado (dni, nombre, apellidos, fecha_nac, salario) VALUES ( :dni, :nombre, :apellidos, :fecha_nac, :salario)"); //Sentencia sql para insertar empleado
$stmt->bindparam(':dni',$dni); //Vinculamos los parametros a las variiables
$stmt->bindparam(':nombre',$nombre);
$stmt->bindparam(':apellidos',$apellidos); //vinculamos parametros a variables
$stmt->bindparam(':fecha_nac',$fecha);
$stmt->bindparam(':salario',$salario);

$dni=$_POST['dni'];	//Rellenamos variables con el formulario
$nombre=$_POST['nombre'];
$apellidos=$_POST['ape'];
$fecha=$_POST['fecha'];
$salario=$_POST['salario'];
$cod_dpto=$_POST['dpto'];
$stmt->execute();

$stmt=$conn->prepare("INSERT INTO emple_depart (dni, cod_dpto, fecha_ini) VALUES ( :dni, :cod_dpto, :fecha_ini)"); //Sentencia sql para insertar en la relacion empleado-departamento
$stmt->bindparam(':dni',$dni);
$stmt->bindparam(':cod_dpto',$cod_dpto);//vinculamos parametros a variables
$stmt->bindparam(':fecha_ini',$fechain);
$fechain=date('Y-m-d');//Habria que poner el metodo de fecha actual pero hay muchos apartados si me da tiempo y me acuerdo vuelvo atras, cosa que deberia hacer dado que no he comentado nada del codigo
$stmt->execute();
echo "</br>Registro añadido";
}
catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}



?>