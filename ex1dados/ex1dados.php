<?php
//JORGE BLAZQUEZ ALVAREZ
include 'ex1dadosfunciones.php';
$jugadores=jugadores($_POST);
$partida=tirarDados($_POST,$jugadores);
imprimirJuego($jugadores,$partida);
ficheraco($jugadores,$partida);


?>