<HTML>
<HEAD><TITLE> Bucles 3 </TITLE></HEAD>
<BODY>
<?php
$num="14241";
$resto=$num;
$resultante="";
$base=16;
$hexa="0123456789abcdef";
//JORGE BLAZQUEZ

while ($resto!=0) {
	$resultante.=substr($hexa, ($resto%$base),1);
	$resto=intval(($resto / $base));
}
	if ($resto!=0) {
		$resultante.=substr($hexa,($resto),1);
	}
	
echo "El numero decimal ".$num." es ".strrev($resultante)." en base Hexadecimal";

?>

</BODY>
</HTML>