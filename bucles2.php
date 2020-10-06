<HTML>
<HEAD><TITLE> Bucles 2 </TITLE></HEAD>
<BODY>
<?php
$num="14241";
$resto=$num;
$resultante="";
$base=8;
//JORGE BLAZQUEZ

while ($resto!=0) {
	$resultante.=strval($resto%$base);
	$resto=intval(($resto / $base));
}
	if ($resto!=0) {
		$resultante.=strval($resto);
	}
	
echo "El numero decimal ".$num." es ".strrev($resultante)." en base ".$base;

?>

</BODY>
</HTML>