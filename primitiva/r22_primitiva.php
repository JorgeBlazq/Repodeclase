<HTML>
<HEAD><TITLE>  </TITLE></HEAD>
<BODY>
<?php
//JORGE BLAZQUEZ
require 'primifunciones.php';
$ganador=generarGanador();
$ganador2=array_reverse($ganador);
//$jugadores=jugar();
$ganadores=boletosPremiados($ganador);
fichero($ganadores,$_POST,$ganador);
imprimirBonico($ganador2,$ganadores,$_POST);


?>
</BODY>
</HTML>
	