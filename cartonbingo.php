<HTML>
<HEAD><TITLE> bingo </TITLE></HEAD>
<BODY>



<?php 
$jugadores = array(
1 => array(1 => array(), 2 => array(), 3 => array()),
2 => array(1 => array(), 2 => array(), 3 => array()),
3 => array(1 => array(), 2 => array(), 3 => array()),
4 => array(1 => array(), 2 => array(), 3 => array())
);

$bombo = range(1,60);
$contjugador=1;
$contcarton=1;
$ganador=false;
$bola;
while ($contjugador <= 4) {
			while ($contcarton<=3) {
				$copiabombo=$bombo;
				while (count($jugadores[$contjugador][$contcarton])<15) {
					array_push($jugadores[$contjugador][$contcarton], $copiabombo[rand(0,(count($bombo)-1))]);
				}
				$contcarton++;
			}
			$contcarton=1;
			$contjugador++;
	}
	shuffle($bombo);
while ($ganador==false) {
	$bola=array_pop($bombo);
	for ($i=1; $i <=4 ; $i++) { 
		for ($j=1; $j <=3 ; $j++) { 
			if (in_array($bola, $jugadores[$i][$j])) {
				array_splice($jugadores[$i][$j], array_search($bola, $jugadores[$i][$j]),1);
			}
			if (count($jugadores[$i][$j])==0) {
				$ganador=true;
				$contjugador=$i;
				$contcarton=$j;
			}
		}
	}

}
echo "</br> Ha ganado el jugador ".$contjugador." con el carton ".$contcarton.".";

//JORGE BLAZQUEZ
?>

</BODY>
</HTML>