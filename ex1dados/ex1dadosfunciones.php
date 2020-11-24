<HTML>
<HEAD><TITLE>DADOS</TITLE></HEAD>
<style type="text/css">
	table{
		border: 1px solid black;
	}
	td{
		border: 1px solid black;
	}
</style>
<BODY>
<?php
//JORGE BLAZQUEZ ALVAREZ

/*
function jugadores
	funcionalidad: determinar numero de jugadores
	parametros:$_POST
	devuelve: array con los nombres de los jugadores;
*/
function jugadores($post){
	$contjug=0;//Contador
	$jugadores = array();
	if ($post['nombre1']!="") {//Añade jugador si el campo no esta vacio
		$contjug++;
		array_push($jugadores, $post['nombre1']);
	}
	if ($post['nombre2']!="") {//Añade jugador si el campo no esta vacio
		$contjug++;
		array_push($jugadores, $post['nombre2']);
	}
	if ($post['nombre3']!="") {//Añade jugador si el campo no esta vacio
		$contjug++;
		array_push($jugadores, $post['nombre3']);
	}
	if ($post['nombre4']!="") {//Añade jugador si el campo no esta vacio
		$contjug++;
		array_push($jugadores, $post['nombre4']);
	}
	if ($contjug<2) {
		exit("Minimo 2 jugadores");//si no hay al menos 2 jugadores detenemos la ejecucion
	}
	if (($post['numdados']<1)||($post['numdados']>10)) {//Validamos tambien el numero de dadfos;
		exit("Minimo 1 dado, maximo 10");
	}
	return $jugadores;
}
/*
function tirarDados
	funcionalidad: Lanza los dados y juega la partida
	parametros:$_POST y el array de jugadores
	devuelve: array multidimensional con las tiradas;
*/
function tirarDados($post,$jugadores){
	$dados = array();
	$partidajugada=array(array());
	for ($j=0; $j <count($jugadores); $j++) { 
		for ($i=0; $i < ($post['numdados']) ; $i++) { 
			$partidajugada[$j][$i]=rand(1,6);
		}
	}
return $partidajugada;
}
/*
function imprimirJuego
	funcionalidad: Imprime la partida en codigo html y determina los ganadores
	parametros:$jugadores, $partidajugada, los arrays devueltos por las funciones anteriores
	devuelve: Nada
*/
function imprimirJuego($jugadores,$partidajugada){
	date_default_timezone_set("Europe/Madrid");
echo date("d.m.y   G:i:s");
echo "</br><table>";
$jugadoresOrden=array();
$acum1=0;
$acum2=0;
$acum3=0;
$acum4=0;
for ($i=0; $i <count($jugadores) ; $i++) { 
	echo "<tr><td>".$jugadores[$i]."</td>";
	for ($j=0; $j < count($partidajugada[$i]); $j++) { 
		echo "<td><img src='images/".$partidajugada[$i][$j].".png' width='30px'></td>";
		switch ($i) {
			case 0:
				$acum1+=$partidajugada[$i][$j];
				break;
			case 1:
				$acum2+=$partidajugada[$i][$j];
				break;
			case 2:
				$acum3+=$partidajugada[$i][$j];
				break;
			case 3:
				$acum4+=$partidajugada[$i][$j];
				break;
			default:
				# code...
				break;
		}
	}
	echo "</tr>";
}
echo "</table></br></br></br>";


/*Determinamos el jugador/es que ha/n ganado, seguro que hay un metodo absurdamente
mas facil, pero hoy estoy lentito
*/
$arrayGanado=array();
$arrayGanadores=array();
for ($i=0; $i <count($jugadores) ; $i++) { 
	echo $jugadores[$i];

	switch ($i) {
	 	case 0:
	 		echo " = ".$acum1;
	 		$arrayGanado[0]=$acum1;
	 		break;
	 	case 1:
	 		echo " = ".$acum2;
	 		$arrayGanado[1]=$acum2;
	 		break;
	 	case 2:
	 		echo " = ".$acum3;
	 		$arrayGanado[2]=$acum3;
	 		break;
	 	case 3:
	 		echo " = ".$acum4;
	 		$arrayGanado[3]=$acum4;
	 		break;
	 	default:
	 		# code...
	 		break;
	 } 
	echo "</br>";	
	}

$victoria=max($arrayGanado);
for ($i=0; $i <count($jugadores) ; $i++) { 
	if ($victoria==$arrayGanado[$i]) {
		array_push($arrayGanadores, $i);
	}
}
for ($i=0; $i <count($arrayGanadores) ; $i++) { 
	echo "GANADOR: ";
	switch ($arrayGanadores[$i]) {
		case 0:
			echo $jugadores[0];
			break;
		case 1:
			echo $jugadores[1];
			break;
		case 2:
			echo $jugadores[2];
			break;
		case 3:
			echo $jugadores[3];
			break;
		default:
			# code...
			break;
	}
	echo "</br>";
}
echo "</br>";
echo "NUMERO GANADORES: ".count($arrayGanadores);
//Esto era mi intento de ordenar el fichero como puedes ver una fumada gigante

if (($acum1>$acum2)&&($acum1>$acum3)&&($acum1>$acum4)) {
	$jugadoresOrden[0]=$jugadores[0];
	if (($acum2>$acum3)&&($acum2>$acum4)) {
		$jugadoresOrden[1]=$jugadores[1];
	}else if (($acum3>$acum2)&&($acum3>$acum4)) {
		$jugadoresOrden[1]=$jugadores[2];
	}else if (($acum4>$acum3)&&($acum4>$acum2)) {
		$jugadoresOrden[1]=$jugadores[3];
	}
}else if (($acum2>$acum1)&&($acum2>$acum3)&&($acum2>$acum4)) {
	$jugadoresOrden[0]=$jugadores[1];
}else if (($acum3>$acum1)&&($acum3>$acum2)&&($acum3>$acum4)) {
	$jugadoresOrden[0]=$jugadores[2];
}else if (($acum4>$acum1)&&($acum4>$acum3)&&($acum4>$acum2)) {
	$jugadoresOrden[0]=$jugadores[3];
}


}
/*
function ficheraco
	funcionalidad: Guarda los resultados de la partida en un fichero(Sin ordenar porque hoy no me funciona el cerebro bien)
	parametros:$jugadores, $partidajugada, los arrays devueltos por las funciones anteriores
	devuelve: nada, genera un fichero en la carpeta base
*/
function ficheraco($jugadores,$partidajugada){
$f2=fopen("apuestas_".time("Gis").".txt", "w");
for ($i=0; $i <count($jugadores) ; $i++) { 
	fwrite($f2, $jugadores[$i]);
	for ($j=0; $j <count($partidajugada[$i]) ; $j++) { 
		fwrite($f2, "#".$partidajugada[$i][$j]);
	}
	fwrite($f2, "\r\n");
}


}
?>
</BODY>
</HTML>