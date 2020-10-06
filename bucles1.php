<HTML>
<HEAD><TITLE> Bucles 1 </TITLE></HEAD>
<BODY>
<?php
$num="14241";
$resto=$num;
$bin="";
//JORGE BLAZQUEZ

while ($resto>1) {
	$bin.=strval($resto%2);
	$resto=intval(($resto / 2));
}
	$bin.=strval($resto);
echo "El numero decimal ".$num." es ".strrev($bin)." en binario";

?>

</BODY>
</HTML>