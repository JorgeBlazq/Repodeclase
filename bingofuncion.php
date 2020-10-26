<HTML>
<HEAD><TITLE> bingo </TITLE></HEAD>
<BODY>
<style type="text/css">
	.acierto{
		background-color: orange;
	}
 	table {
 		float: left;
 }
</style>


<?php
//JORGE BLAZQUEZ
//variables
$numjug=4;
$jugadores = array();
$bomboog = array();


/*
array(array(),array(),array()),
array(array(),array(),array()),
array(array(),array(),array()),
array(array(),array(),array())*/
//Array de 4 jugadores con 3 arrays de carton cada uno



function crearJugadores($numjug, $jugadores){
	for ($i=0; $i < $numjug; $i++) { 
		array_push($jugadores,array(array(),array(),array())); //Construimos el array jugadores basandonos en el numero de jugadores
	}
	return $jugadores;
}

function construirCartones($numjug, $jugadores){
	$contjugador=0;
	$contcarton=0;
	while ($contjugador < $numjug) {
				while ($contcarton<3) {
					$bombo=range(1, 60);
					shuffle($bombo); //aleatorizamos un array de 60nums
					while (count($jugadores[$contjugador][$contcarton])<15) {
						array_push($jugadores[$contjugador][$contcarton],array_pop($bombo)); //metemos numero al carton y lo sacmos del array
					}
					$contcarton++;
				}
				$contcarton=0;
				$contjugador++;
		}
		return $jugadores;
}

$jugadores = crearJugadores($numjug, $jugadores);
$jugadores = construirCartones($numjug, $jugadores);
//$jugadoresog = $jugadores;
$bombo = range(1,60);
shuffle($bombo);


function jugarPartida($numjug,$jugadores,$bombo){
	$ganador=false;
	$bomboog=array();
	$bola;
	while (count($bombo)!=0) {
		$bola=array_pop($bombo); //Sacamos bola
		array_push($bomboog,$bola); //guardamos el numero para saber cuales han salido en el futuro
		for ($i=0; $i < $numjug ; $i++) { 
			for ($j=0; $j <3 ; $j++) { 
				if (in_array($bola, $jugadores[$i][$j])) { //Si el numero esta en el carton
					array_splice($jugadores[$i][$j], array_search($bola, $jugadores[$i][$j]),1);// lo sacamos del array
				}
				if (count($jugadores[$i][$j])==0) { //Si el carton se queda a 0 has ganao fiera maquinon tuneladora mecanica
					$ganador=true;
					echo "</br> Ha ganado el jugador ".($i+1)." con el carton ".($j+1)."."; //Ganador dentro del bucle por si hay varios ganadores.
				}
			}
			

		}
	if ($ganador) {
				break;
				return $bomboog;
			}
	}
	return $bomboog;
}

$bombo=jugarPartida($numjug,$jugadores,$bombo);



function imprimirJuego($numjug,$jugadores,$bombo){
	for ($i=0; $i < $numjug ; $i++) {  //Interfaz mu fea
		for ($j=0; $j <3 ; $j++) { //una tabla por jcarton
		echo "<table style='border: 1px solid black;'>";
		echo "<tr style='border: 1px solid black;'><td style='border: 1px solid black;'>J".($i+1)."C".($j+1)."</td></tr><tr style='border: 1px solid black;'>";
		for ($y=1; $y <16 ; $y++) { 

			if (in_array($jugadores[$i][$j][$y-1], $bombo)) {
				echo "<td class='acierto' style='border: 1px solid black;'>".$jugadores[$i][$j][$y-1]."</td>";
			}else{
			echo "<td style='border: 1px solid black;'>".$jugadores[$i][$j][$y-1]."</td>";}
			if ($y%5==0) {
				echo "</tr><tr style='border: 1px solid black;'>";
			}
		}
}
	echo "</table>";
	}
}

imprimirJuego($numjug,$jugadores,$bombo);

?>
</BODY>
</BODY>
</HTML>