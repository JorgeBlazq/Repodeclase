<HTML>
<HEAD><TITLE> Bucles 6 </TITLE></HEAD>
<BODY>
<table style="border:  1px solid black;">
<?php
$num="5";
$acum=1;

//JORGE BLAZQUEZ
echo $num."! = ";
for ($i=$num; $i >1 ; $i--) { 
 	echo $i." * ";
 	$acum*=$i;
 }

echo "1 = ".$acum

?>
</table>
</BODY>
</HTML>