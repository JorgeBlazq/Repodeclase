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
include 'bingofuncion.php';
$numjug=4;//Numero de Jugadores
$jugadores = array();//Creacion de array jugadores al que insertaremos jugadores y cartones
$bomboog = array();//Almacen de numeros que salen del bombo
$jugadores = crearJugadores($numjug, $jugadores);//Llamada a la funcion que creara jugadores dentro del array
$jugadores = construirCartones($numjug, $jugadores);//Llamada a la funcion que creara cartones dentro del array
$bombo = range(1,60);//Declaracion del bombo
shuffle($bombo);//Aleatorizacion del bombo
$bombo=jugarPartida($numjug,$jugadores,$bombo);//Llamada a la ejecucion de la partida
imprimirJuego($numjug,$jugadores,$bombo);//Llamada a la visualizacion HTML de la partida
?>
</BODY>
</BODY>
</HTML>