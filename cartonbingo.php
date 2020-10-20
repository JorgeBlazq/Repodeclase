<HTML>
<HEAD><TITLE> bingo </TITLE></HEAD>
<BODY>



<?php 
$jugadores = array(
array(array(),array(),array()),
array(array(),array(),array()),
array(array(),array(),array()),
array(array(),array(),array())
);//Array de 4 jugadores con 3 arrays de carton cada uno

$jugadoresog=$jugadores;//Para recordar los numeros de los cartones y esas cosas

$bombo = range(1,60);
$contjugador=0;
$contcarton=0;
$ganador=false;

$bola;



while ($contjugador < 4) {
			while ($contcarton<3) {
				$copiabombo=$bombo;
				shuffle($copiabombo);
				while (count($jugadores[$contjugador][$contcarton])<15) {
					array_push($jugadores[$contjugador][$contcarton],array_pop($copiabombo));
				}
				$contcarton++;
			}
			$contcarton=0;
			$contjugador++;
	}
	shuffle($bombo);
while ($ganador==false) {
	$bola=array_pop($bombo);
	for ($i=0; $i <4 ; $i++) { 
		for ($j=0; $j <3 ; $j++) { 
			if (in_array($bola, $jugadores[$i][$j])) {
				array_splice($jugadores[$i][$j], array_search($bola, $jugadores[$i][$j]),1);
			}
			if (count($jugadores[$i][$j])==0) {
				$ganador=true;
				$contjugador=$i;
				$contcarton=$j;
				echo "</br> Ha ganado el jugador ".(intval($contjugador)+1)." con el carton ".(intval($contcarton)+1).".";
			}
		}
	}

}


//JORGE BLAZQUEZ
?>

</BODY>
</HTML>