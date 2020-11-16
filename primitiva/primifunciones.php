<HTML>
<HEAD><TITLE> bingo </TITLE></HEAD>
<BODY>
<?php
/*
function generarGanador
	funcionalidad: Generar combinacion ganadora
	parametros:ninguno
	devuelve: la combinacion ganadora

*/
function generarGanador(){
	$bombo=range(1, 49);
	shuffle($bombo);
	$ganador = array();
	for ($i=0; $i <= 6 ; $i++) { 
		$ganador[$i]=array_pop($bombo);
	}
	$ganador[7]=rand(1,9);
	return $ganador;
}

/*
Funcion boletosPremiados
	Parametros: $ganador(La combinacion ganadora)
	Funcionalidad: leer apuesta y comprobar su premio
	retorno: $ganadores(array con numero de premio por tipo)
*/
function boletosPremiados($ganador){
	$ganadores = array(0,0,0,0,0,0,0,0,0);//array de ganadores por categoria
	//0->6 nums 1->5 2->4 num 3->3 num 4->reint 5->2num 6->1num 7->0 8->5+complementario
	$f1=fopen("r22_primitiva2.txt", "r");//leemos el fichero de apuestas
	$combinacion=array();//array en el que almacenaremos el decimo a comprobar
	$cont=0;
	$cont2=0;
	$chars="";
	fgets($f1);//saltamos la primera fila
	while (!feof($f1)){//Bucle hasta fin de fichero
		$linea=fgets($f1);//Obtenemos linea de fichero
		for ($i=6; $i < strlen($linea) ; $i++) { //el bucle detecta donde hay un guion y almacena en un $combinacion 
			
			if (substr($linea, $i, 1)=="-") {
				$combinacion[$cont2]=$chars;
				$chars="";
				$cont2++;
			} else {
				$chars=$chars.substr($linea, $i, 1);
			}
		}
		 
		$combinacion[7]=$chars;
		$chars="";
		$cont2=0;
		$cont++;
		

		$aciertos=0;
		for ($j=0; $j <= 5; $j++) { //Contamos los aciertos de dicha combinacion
			if ($combinacion[$j]==$ganador[$j]) {
				$aciertos++;
			}
		}
		switch ($aciertos) {//Guardamos en el array ganadores dependiendo de sus aciertos
			case 0:
				if ($combinacion[7]==$ganador[7]) {
					$ganadores[4]=$ganadores[4]+1;
				} else{
					$ganadores[7]=$ganadores[7]+1;
				}
				break;
			case 1:
				if ($combinacion[7]==$ganador[7]) {
					$ganadores[4]=$ganadores[4]+1;
				} else{
					$ganadores[6]=$ganadores[6]+1;
				}
				break;
			case 2:
				if ($combinacion[7]==$ganador[7]) {
					$ganadores[4]=$ganadores[4]+1;
				} else{
					$ganadores[5]=$ganadores[5]+1;
				}
				break;
			case 3:
				$ganadores[3]=$ganadores[3]+1;
				break;
			case 4:
				$ganadores[2]=$ganadores[2]+1;
				break;
			case 5:
				if ($combinacion[6]==$ganador[6]) {
					$ganadores[8]=$ganadores[8]+1;
				} else{
					$ganadores[1]=$ganadores[1]+1;
				}
				break;
			case 6:
				$ganadores[0]=$ganadores[0]+1;
				break;
			default:
				# code...
				break;
		}
		}
		
	
	return $ganadores;//devolvemos ganadores para imprimir posteriormente
}

/*
FUNCION fichero
	parametros(
		$ganadores(numero de premios por categoria)
		$POST(el valor del formulario)
	)
	funcionalidad(Crea un fichero con los premios)
*/
function fichero($ganadores,$POST){
$f2=fopen("premiosorteo_".$POST['fechasorteo'].".txt", "w");//leemos el fichero  en modo escritura y sobreescribimos si existe(no se juega la primitiva 2 veces el mismo dia)
if ($ganadores[0]==0) { //Escribimos a partir de los valores del array $ganadores
	fwrite($f2, "C6 "."0"." ".$ganadores[0]."\r\n");
} else {
	fwrite($f2, "C6 ".(($POST['recaudacion']*0.4)/$ganadores[0])." ".$ganadores[0]."\r\n");
	}
if ($ganadores[8]==0) {
	fwrite($f2, "C6 "."0"." ".$ganadores[8]."\r\n");
} else {
	fwrite($f2, "C6 ".(($POST['recaudacion']*0.3)/$ganadores[8])." ".$ganadores[8]."\r\n");
	}
if ($ganadores[1]==0) {
	fwrite($f2, "C6 "."0"." ".$ganadores[1]."\r\n");
} else {
	fwrite($f2, "C6 ".(($POST['recaudacion']*0.15)/$ganadores[1])." ".$ganadores[1]."\r\n");
	}
if ($ganadores[2]==0) {
	fwrite($f2, "C6 "."0"." ".$ganadores[2]."\r\n");
} else {
	fwrite($f2, "C6 ".(($POST['recaudacion']*0.05)/$ganadores[2])." ".$ganadores[2]."\r\n");
	}
if ($ganadores[3]==0) {
	fwrite($f2, "C6 "."0"." ".$ganadores[3]."\r\n");
} else {
	fwrite($f2, "C6 ".(($POST['recaudacion']*0.08)/$ganadores[3])." ".$ganadores[3]."\r\n");
	}
if ($ganadores[4]==0) {
	fwrite($f2, "C6 "."0"." ".$ganadores[4]."\r\n");
} else {
	fwrite($f2, "C6 ".(($POST['recaudacion']*0.02)/$ganadores[4])." ".$ganadores[4]."\r\n");
	}
}
/*
funcion imprimirBonico
	funcionalidad: efectivamente: imprimir el programa en html
	parametros($ganador:combinacion ganadora, $post para la fecha)
	devuelve: nada
*/
function imprimirBonico($ganador,$ganadores,$POST){

echo "<h4>Lotería Primitiva de España / Sorteo   ".$POST['fechasorteo']."</h4></br></br></br>";
echo "<table><tr><td>Numero 1</td><td>Numero 2</td><td>Numero 3</td><td>Numero 4</td><td>Numero 5</td><td>Numero 6</td><td>Complementario</td><td>Reintegro</td></tr><tr>";
while (count($ganador)!=0) {	
		echo '<td><img src="img/'.array_pop($ganador).'.png" width="30px"></td>';
	}
echo "</tr></table></br></br></br>";
$contuwu=0;

for ($i=0; $i <count($ganadores) ; $i++) { 
	$contuwu+=$ganadores[$i];
}


echo "<p>Apuestas jugadas: ".$contuwu."<ul><li>Acertantes 6 n&uacutemeros: ".$ganadores[0]."</li>";
echo "<li>Acertantes 5 n&uacutemeros + Complementario: ".$ganadores[8]."</li>";
echo "<li>Acertantes 5 n&uacutemeros: ".$ganadores[1]."</li>";
echo "<li>Acertantes 4 n&uacutemeros: ".$ganadores[2]."</li>";
echo "<li>Acertantes 3 n&uacutemeros: ".$ganadores[3]."</li>";
echo "<li>Acertantes Reintegros: ".$ganadores[4]."</li>";
echo "<li>Sin premio 2 n&uacutemeros: ".$ganadores[5]."</li>";
echo "<li>Sin premio 1 n&uacutemeros: ".$ganadores[6]."</li>";
echo "<li>Sin premio 0 n&uacutemeros: ".$ganadores[7]."</li>";

}

?>
</BODY>
</HTML>