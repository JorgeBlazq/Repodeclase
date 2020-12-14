<?php
//Parametros BBDD SQL
$servername='localhost';
$username='root';
$password='rootroot';


try {
$conn = new PDO("mysql:host=$servername;dbname=empleadosnn", $username, $password);//Generamos una conexion a la base de datos empleadosNN usando los metodos de PDO
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//El copypaste de las excepciones
echo "Conexion Realizada";

$nomb = $_POST['nombre']; //Recibimos el nombre del formulario
$sql2='select max(cod_dpto) as codigogordo from departamento';//Realizamos un Select para obtener el codigo mas grande
 foreach ($conn->query($sql2) as $row) {
        $codep = $row['codigogordo'];
        
        if ($codep=="") {
	$codep='d001';//Si no hay ningun departamento crearemos el d001
}else{
	$codep='d'.str_pad(strval(intval(substr($codep, 1))+1),3,"0",STR_PAD_LEFT);//Si existen departamentos crearemos dxxx+1 siendo dxxx el mayor valor para el cod_dpto
}

}
$stmt=$conn->prepare("INSERT INTO departamento (cod_dpto, nombre_dpto) VALUES (:codigo,:nombre)"); //Preparamos la sentendcia de insertar
$stmt->bindparam(':codigo',$codep);//vinculamos parametros a las variables
$stmt->bindparam(':nombre',$nomb);
$stmt->execute();


echo "</br>Registro añadido";
}
catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}



?>